<?php
$session = session();
if (!$session->get('logged_in')) {
    header('Location: ' . base_url('auth/login'));
    exit();
}
?>

<!-- Load Navbar Before Loader -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<?= view('layout/header', ['title' => 'Home']) ?>
<link rel="icon" type="image/png" href="<?= base_url('/images/logo/logo1.png'); ?>">

<!-- Page Content (Excluding Navbar) -->
<div id="page-content">
    <section class="gensys-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 text-center text-lg-start">
                    <h1 class="gensys-title">
                        “ <span class="highlight">EMPOWERING LIVES TO GROW AND TRANSFORM, CREATING A FUTURE OF POSSIBILITIES</span> ”
                    </h1>
                    <p class="gensys-subtext">
                        Children who are in Grade School, High School, Senior High, or College <br>
                        Studying in a Public School at Imus or Bacoor Cavite
                    </p>
                    <div class="search-container">
                        <input type="text" placeholder="Search here..." class="search-box">
                        <button class="search-button">SEARCH</button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 text-center">
                    <div class="gensys-image-container">
                        <img src="<?= base_url('images\homepage pics\hp1.png') ?>" alt="Gensys Team" class="gensys-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gensys-initiatives">
        <div class="container">
            <h2 class="section-header">Join Our Gensys Community Initiatives</h2>
            <p class="section-subtext">Be part of meaningful projects that create positive change.</p>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="initiative-card">
                        <div class="initiative-image">
                            <img src="<?= base_url('images\homepage pics\explore1.png') ?>" alt="Gensys Cares">
                        </div>
                        <button class="explore-btn">EXPLORE</button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="initiative-card">
                        <div class="initiative-image">
                            <img src="<?= base_url('images\homepage pics\explore2.png') ?>" alt="Blood Donation">
                        </div>
                        <button class="explore-btn">EXPLORE</button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="initiative-card">
                        <div class="initiative-image">
                            <img src="<?= base_url('images\homepage pics\explore3.png') ?>" alt="100 Scholars Program">
                        </div>
                        <button class="explore-btn">EXPLORE</button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="initiative-card">
                        <div class="initiative-image">
                            <img src="<?= base_url('images\homepage pics\explore4.png') ?>" alt="Coastal Cleanup Drive">
                        </div>
                        <button class="explore-btn">EXPLORE</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-section">
        <div class="feature-container">
            <div class="feature-image">
                <img src="<?= base_url('images\homepage pics\hp2.png') ?>" alt="Feature Image">
            </div>
            <div class="feature-content">
                <h2>Sustainability Through Smart Solutions</h2>
                <p>Empowering communities with innovative solutions. At Gensys Cares, we are committed to creating opportunities, transforming lives, and building a future where technology and compassion come together for a better tomorrow. </p>
            </div>
        </div>
    </section>

    <section class="social-wall">
        <h2 class="social-wall-header">Gensys Cares Community Hub</h2>

        <!-- Improved Create Post Button -->
        <button class="create-post-btn" onclick="handleCreatePost()">
            <span class="plus-icon">╋</span> Create Post
        </button>

        <div class="social-container" id="socialContainer">
            <!-- Example Posts -->
            <div class="social-post">
                <div class="social-post-content">
                    <h3>@SirMarkTheMentor</h3>
                    <p>Empowering young minds through digital learning! Every student deserves access to quality education. 💡✨ #GensysCares #EducationForAll #FutureLeaders</p>
                </div>
            </div>
        </div>
    </section>

    <script>
    function handleCreatePost() {
    let isLoggedIn = <?= json_encode(session()->get('logged_in') ?? false); ?>;

    if (!isLoggedIn) {
        alert("You need to log in to create a post.");
        return;
    }

    let message = prompt("Enter your post:");

    if (!message || message.trim() === "") {
        alert("Post message cannot be empty!");
        return;
    }

    console.log("Message to post:", message);  // Debugging message

    fetch("http://localhost:8080/social/create", {  // Use full URL to avoid path issues
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"  // Ensures CI recognizes it as AJAX
        },
        body: JSON.stringify({ message: message.trim() })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            let postContainer = document.createElement("div");
            postContainer.classList.add("social-post");

            postContainer.innerHTML = `
                <div class="social-post-content">
                    <h3>@${data.user_name}</h3>
                    <p>${message}</p>
                </div>
            `;

            document.getElementById("socialContainer").prepend(postContainer);
        } else {
            alert(data.error || "Failed to create post. Please try again.");
        }
    })
    .catch(error => {
        console.error("Error creating post:", error);
        alert("There was an error while creating the post.");
    });
}

</script>

    <style>
        .create-post-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin: 15px auto;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background: linear-gradient(45deg, #007bff, #0056b3);
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 10px rgba(0, 123, 255, 0.3);
        }

        .create-post-btn .plus-icon {
            font-size: 18px;
        }

        .create-post-btn:hover {
            background: linear-gradient(45deg, #0056b3, #003f80);
            box-shadow: 0px 6px 12px rgba(0, 86, 179, 0.5);
            transform: translateY(-2px);
        }

        .social-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* 4 columns */
            gap: 20px;
            /* Space between posts */
        }

        .social-post {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .social-post-content p {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            /* Limit to 5 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            /* Adds "..." at the end of truncated text */
        }
    </style>

    <section class="faq-section">
        <br><br><br><br><br><br><br><br>
        <h2>Frequently Asked Questions</h2>

        <div class="faq">
            <button class="faq-question">
                What services does Gensys Cares offer?
                <span class="icon">▼</span>
            </button>
            <div class="faq-answer">We provide IT solutions, web development, and consulting services tailored to businesses and individuals.</div>
        </div>

        <div class="faq">
            <button class="faq-question">
                How can I get support?
                <span class="icon">▼</span>
            </button>
            <div class="faq-answer">You can reach us through our contact form or email support@gensyscares.com.</div>
        </div>

        <div class="faq">
            <button class="faq-question">
                Is Gensys Cares available globally?
                <span class="icon">▼</span>
            </button>
            <div class="faq-answer">Yes! We offer remote and on-site services depending on your location.</div>
        </div>

        <br><br><br><br><br><br>
    </section>

    <script>
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.nextElementSibling;

                // Close all other answers before opening the clicked one
                document.querySelectorAll('.faq-answer').forEach(ans => {
                    if (ans !== answer) {
                        ans.classList.remove('show');
                    }
                });

                // Toggle the clicked answer
                answer.classList.toggle('show');
            });
        });
    </script>

</div>

<link rel="stylesheet" href="/assets/css/footerstyle.css">
<?= view('layout/footer') ?>