<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['fullName'])) {
    $userName = $_SESSION['fullName'];
} else {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hamroCV";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data for CV
$sql = "SELECT * FROM professional_summary WHERE user_name = '$userName'";
$result = $conn->query($sql);
$summary = $result->fetch_assoc();

$sql = "SELECT * FROM education WHERE user_name = '$userName'";
$result = $conn->query($sql);
$education = $result->fetch_all(MYSQLI_ASSOC);

$sql = "SELECT * FROM experience ";
$result = $conn->query($sql);
$experience = $result->fetch_all(MYSQLI_ASSOC);

$sql = "SELECT * FROM skills WHERE user_name = '$userName'";
$result = $conn->query($sql);
$skills = $result->fetch_all(MYSQLI_ASSOC);

$sql = "SELECT * FROM interests WHERE user_name = '$userName'";
$result = $conn->query($sql);
$interests = $result->fetch_all(MYSQLI_ASSOC);

$sql = "SELECT * FROM social_links ";
$result = $conn->query($sql);
$socialLinks = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cv.css">
    <title>My Resume</title>
</head>
<body>
    <header>
        <h1>hamroCV</h1>
    </header>
    <main class="cv-content">
        <section class="personal-info">
            <h2>Personal Information</h2>
            <p>Name: <?php echo htmlspecialchars($userName); ?></p>
        </section>
        <section class="summary">
            <h2>Summary</h2>
            <p><?php echo htmlspecialchars($summary['summary']); ?></p>
        </section>
        <section class="education">
            <h2>Education</h2>
            <ul>
                <?php foreach ($education as $edu): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($edu['degree']); ?></strong> at <?php echo htmlspecialchars($edu['institute_name']); ?>, 
                        <p><b>Start Date:</b> <?php echo htmlspecialchars($edu['graduation_start_date']); ?></p>
                        <p><b>End Date:</b> <?php echo htmlspecialchars($edu['graduation_end_date']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <!-- <section class="experience">
            <h2>Experience</h2>
            <ul>
                <?php foreach ($experience as $exp): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($exp['job_title']); ?></strong> at <?php echo htmlspecialchars($exp['company']); ?>, 
                        <?php echo htmlspecialchars($exp['years']); ?>
                        <p><?php echo htmlspecialchars($exp['description']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section> -->
        <section class="skills">
            <h2>Skills</h2>
            <ul>
                <?php foreach ($skills as $skill): ?>
                    <li><?php echo htmlspecialchars($skill['skill_name']); ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section class="interests">
            <h2>Interests</h2>
            <ul>
                <?php foreach ($interests as $interest): ?>
                    <li><?php echo htmlspecialchars($interest['interest1']); ?></li>
                    <li><?php echo htmlspecialchars($interest['interest2']); ?></li>
                    <li><?php echo htmlspecialchars($interest['interest3']); ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section class="social-links">
            <h2>Social Links</h2>
            <ul>
                <li><a href="<?php echo htmlspecialchars($socialLinks['facebook_link']); ?>">Facebook</a></li>
                <li><a href="<?php echo htmlspecialchars($socialLinks['instagram_link']); ?>">Instagram</a></li>
                <li><a href="<?php echo htmlspecialchars($socialLinks['linkedin_link']); ?>">LinkedIn</a></li>
                <li><a href="<?php echo htmlspecialchars($socialLinks['website_link']); ?>">Website</a></li>
            </ul>
        </section>
        <section class="photo">
            <h2>Photo</h2>
            <img src="path/to/photo.jpg" alt="Profile Photo">
        </section>
    </main>
    <footer>
        <p>Copyright &copy; 2024 hamroCV. Designed By Ujwol, Raju, Saurav</p>
    </footer>
</body>
</html>
