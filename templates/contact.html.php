<!-- Nhúng file CSS -->
<link rel="stylesheet" href="contact.css">

<h2 class="form-title">Contact Admin ✉️</h2>

<div class="form-card">
    <form method="post" enctype="multipart/form-data">
        
        <label class="form-label">Your Name</label>
        <input type="text" name="name" required placeholder="Enter your name..." class="form-input">

        <label class="form-label">Your Email</label>
        <input type="email" name="email" required placeholder="Enter your email..." class="form-input">

        <label class="form-label">Message</label>
        <textarea name="content" required placeholder="Tell us which film you want to add..." class="form-input form-textarea"></textarea>

        <label class="form-label">Film Image (Optional)</label>
<div class="file-upload-wrapper">
    <label for="imgInput" class="btn-pick-image">
        📷 Pick Image
    </label>

    <input type="file" 
           name="film_image" 
           id="imgInput"
           accept="image/*"
           style="display:none;"
           aria-label="Upload film image">

    <span class="file-note">Choose an optional image</span>
</div>

        <div class="form-buttons">
            <input type="submit" name="submit" value="Send Message" class="btn-submit">
        </div>
    </form>
</div>