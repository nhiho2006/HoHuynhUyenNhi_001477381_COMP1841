<h2 class="page-title">
    Add New Film 🎬
</h2>

<div class="form-card">
    <form action="" method="post" enctype="multipart/form-data">
        
        <!-- Film name -->
        <label class="form-label">Film Name:</label>
        <input type="text" name="name" class="form-input" required>

        <!-- Alt text -->
        <label class="form-label">Image Description (Alt Text):</label>
        <input type="text" name="alt_text" class="form-input" required>

        <!-- Upload -->
        <label class="form-label">Film Poster (Image):</label>

        <div class="upload-box">
            
            <!-- Custom pink button -->
            <label for="imgInput" class="upload-btn">
                Pick an image
            </label>

            <!-- Hidden input -->
            <input type="file" name="film_image" id="imgInput" accept="image/*" class="file-input">

            <!-- Note -->
            <p class="upload-note">
                Select a poster for the film
            </p>
        </div>

        <!-- Warning -->
        <p class="upload-warning">
            * This image will be shown when users review this film.
        </p>

        <!-- Submit -->
        <input type="submit" value="Save Film" class="submit-btn">
    </form>
</div>