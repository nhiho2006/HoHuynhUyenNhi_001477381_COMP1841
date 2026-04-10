<?php
// 1. Generic query function (reusable for all database operations)
function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql); // Prepare statement to prevent SQL injection
    $query->execute($parameters); // Execute with parameters
    return $query; // Return PDOStatement object
}

// 2. Get total number of reviews
function totalReviews($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM review');
    $row = $query->fetch();
    return $row[0]; // Return count value
}

// 3. Get a single review by ID with related film and user info
function getReview($pdo, $id) {
    $sql = 'SELECT review.*, 
                   film.name AS filmname, 
                   film.image AS filmimage, -- Film image
                   user.name AS username 
            FROM review 
            LEFT JOIN film ON review.filmid = film.id 
            LEFT JOIN user ON review.userid = user.id 
            WHERE review.id = :id';
    
    $parameters = ['id' => $id];
    $query = query($pdo, $sql, $parameters);
    return $query->fetch(); // Return single review
}

// 4. Get all reviews with related data
function getReviews($pdo) {
    $sql = 'SELECT review.id, review.reviewtext, review.reviewdate, 
                   review.likes, review.dislikes, review.rating,
                   film.image, film.alt_text,
                   user.name AS username, 
                   film.name AS filmname 
            FROM review 
            INNER JOIN user ON review.userid = user.id 
            INNER JOIN film ON review.filmid = film.id
            ORDER BY review.reviewdate DESC';
    return query($pdo, $sql);
}

// 5. Insert a new review including rating
function insertReview($pdo, $reviewtext, $userid, $filmid, $rating) {
    $sql = 'INSERT INTO review SET 
            reviewtext = :reviewtext, 
            reviewdate = NOW(), 
            userid = :userid, 
            filmid = :filmid,
            rating = :rating';
            
    query($pdo, $sql, [
        ':reviewtext' => $reviewtext,
        ':userid' => $userid,
        ':filmid' => $filmid,
        ':rating' => $rating
    ]);
}

// 6. Update an existing review
function updateReview($pdo, $id, $reviewtext, $userid, $filmid) {
    query($pdo, 
        'UPDATE review SET reviewtext = :reviewtext, userid = :userid, filmid = :filmid WHERE id = :id', 
        [':id' => $id, ':reviewtext' => $reviewtext, ':userid' => $userid, ':filmid' => $filmid]
    );
}

// 7. Delete a review (supports GDPR "Right to be Forgotten")
function deleteReview($pdo, $id) {
    query($pdo, 'DELETE FROM review WHERE id = :id', [':id' => $id]);
}

// 8. Get all users (basic info)
function getUsers($pdo) {
    return query($pdo, 'SELECT id, name, email FROM user');
}

// 9. Insert a new user
function insertUser($pdo, $name, $email) {
    query($pdo, 
        'INSERT INTO user SET name = :name, email = :email', 
        [':name' => $name, ':email' => $email]
    );
}

// 10. Get all films
function getFilms($pdo) {
    return query($pdo, 'SELECT id, name, image, alt_text FROM film');
}

// 11. Insert a new film (includes accessibility alt_text)
function insertFilm($pdo, $name, $image, $alt_text) {
    query($pdo, 
        'INSERT INTO film SET name = :name, image = :image, alt_text = :alt_text', 
        [
            ':name' => $name,
            ':image' => $image,
            ':alt_text' => $alt_text
        ]
    );
}

// 12. Get film ID by name
function getFilmByName($pdo, $filmname) {
    return query($pdo, 
        'SELECT id FROM film WHERE name = :filmname', 
        [':filmname' => $filmname]
    )->fetch();
}

// 13. Get all films (used for dropdowns)
function allFilms($pdo) {
    return query($pdo, 'SELECT id, name, image, alt_text FROM film');
}

// 14. Get all users (simplified for dropdown)
function allUsers($pdo) {
    return query($pdo, 'SELECT id, name FROM user');
}

// 15. Get a single film by ID
function getFilm($pdo, $id) {
    return query($pdo, 
        'SELECT * FROM film WHERE id = :id', 
        [':id' => $id]
    )->fetch();
}

// 16. Update film details (including accessibility text)
function updateFilm($pdo, $id, $name, $alt_text) {
    query($pdo, 
        'UPDATE film SET name = :name, alt_text = :alt_text WHERE id = :id', 
        [
            ':id' => $id,
            ':name' => $name,
            ':alt_text' => $alt_text
        ]
    );
}

// 17. Delete a film
function deleteFilm($pdo, $id) {
    query($pdo, 'DELETE FROM film WHERE id = :id', [':id' => $id]);
}

// 18. Get a single user by ID
function getUser($pdo, $id) {
    return query($pdo, 
        'SELECT * FROM user WHERE id = :id', 
        [':id' => $id]
    )->fetch();
}

// 19. Update user details
function updateUser($pdo, $id, $name, $email) {
    query($pdo, 
        'UPDATE user SET name = :name, email = :email WHERE id = :id', 
        [':id' => $id, ':name' => $name, ':email' => $email]
    );
}

// 20. Delete user (demonstrates GDPR "Right to be Forgotten")
function deleteUser($pdo, $id) {
    query($pdo, 'DELETE FROM user WHERE id = :id', [':id' => $id]);
}

// 21. Insert contact message with timestamp
function insertContact($pdo, $name, $email, $content, $film_image) {
    $query = 'INSERT INTO `contact` (`name`, `email`, `content`, `film_image`, `date`) 
              VALUES (:name, :email, :content, :film_image, NOW())';
    
    $parameters = [
        ':name' => $name,
        ':email' => $email,
        ':content' => $content,
        ':film_image' => $film_image
    ];

    $stmt = $pdo->prepare($query);
    $stmt->execute($parameters);
}

// 22. Get all contact messages
function getContacts($pdo) {
    return query($pdo, 'SELECT * FROM contact ORDER BY date DESC');
}

// 23. Get user by email (used for validation or login logic)
function getUserByEmail($pdo, $email) {
    return query($pdo, 
        'SELECT * FROM user WHERE email = :email', 
        [':email' => $email]
    )->fetch();
}

// 24. Update like or dislike count
function updateInteraction($pdo, $id, $type) {
    if ($type == 'like') {
        query($pdo, 'UPDATE review SET likes = likes + 1 WHERE id = :id', [':id' => $id]);
    } else if ($type == 'dislike') {
        query($pdo, 'UPDATE review SET dislikes = dislikes + 1 WHERE id = :id', [':id' => $id]);
    }
}

// 25. Search reviews by text or film name
function searchReviews($pdo, $searchTerm) {
    $sql = 'SELECT review.id, review.reviewtext, review.reviewdate, 
                   review.likes, review.dislikes, review.rating, 
                   film.name AS filmname, user.name AS username, 
                   film.image AS filmimage, film.alt_text
            FROM review 
            INNER JOIN user ON review.userid = user.id 
            INNER JOIN film ON review.filmid = film.id 
            WHERE review.reviewtext LIKE :search OR film.name LIKE :search
            ORDER BY review.reviewdate DESC';
            
    return query($pdo, $sql, [':search' => '%' . $searchTerm . '%']);
}

// 26. Get latest reviews (prioritises newest ID)
function getLatestReviews($pdo) {
    $sql = 'SELECT review.*, film.name AS filmname, film.image AS filmimage, user.name AS username 
            FROM review 
            LEFT JOIN film ON review.filmid = film.id 
            LEFT JOIN user ON review.userid = user.id 
            ORDER BY review.id DESC, review.reviewdate DESC'; 
    return query($pdo, $sql);
}

// 27. Get most liked reviews
function getMostLikedReviews($pdo) {
    $sql = 'SELECT review.*, 
                   film.name AS filmname, 
                   user.name AS username, 
                   film.image AS filmimage, 
                   film.alt_text
            FROM review 
            INNER JOIN user ON review.userid = user.id 
            INNER JOIN film ON review.filmid = film.id 
            ORDER BY review.likes DESC';
    return query($pdo, $sql);
}

// 28. Update review image (if stored separately)
function updateReviewImage($pdo, $reviewId, $imageName) {
    $parameters = ['image' => $imageName, 'id' => $reviewId];
    query($pdo, 'UPDATE review SET image = :image WHERE id = :id', $parameters);
}

// Get films that have not been reviewed yet
function getUnreviewedFilms($pdo) {
    $sql = 'SELECT id, name FROM film 
            WHERE id NOT IN (SELECT filmid FROM review)';
    
    $query = $pdo->query($sql);
    return $query->fetchAll();
}

// Get top-rated films based on average rating
function getTopRatedFilms($pdo) {
    $sql = 'SELECT film.id, film.name AS filmname, film.image AS filmimage, film.alt_text,
                   AVG(review.rating) AS avg_rating,
                   COUNT(review.id) AS review_count
            FROM film
            INNER JOIN review ON film.id = review.filmid
            GROUP BY film.id
            ORDER BY avg_rating DESC';
    return query($pdo, $sql);
}