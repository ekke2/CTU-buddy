<!DOCTYPE html>
<html>
    <Head>
        <meta charset="UTF-8">
        <meta name="Author" content="ThisIsTheWriters">
        <meta name="Description" content="CTU student website">
        <link rel="stylesheet" href="Recources.css" type="text/css">
        <script src="https://kit.fontawesome.com/62fae0b962.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="footer.css">
        <link rel="stylesheet" href="navbar.css">
        <title>
        Recources
        </title>

    </Head>

    <Body>
         <!--Navigation 1-->
         <nav class="nav">
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
              <i class="fa-solid fa-2x fa-bars" style="color: whitesmoke;"></i>
             </label>
            <label class="logo">CTU-Buddy</label>  
            <ul class="nav-links">
              <li><a href="Home.html">Home</a></li>
              <li><a href="TimeTable.html">Time Table</a></li>
              <li><a href="Discussion.html">Discussion</a></li>
              <li><a href="Recourxes.php" class="active">Recources</a></li>
              <li><a href="about.html">About Us</a></li>
              <li><a href="contact.html">Contact Us</a></li>
            </ul>
            </nav>
            
            <main>
                <h1>Share Resources</h1>
                
                <section class="upload-section">
                    <h2>Upload a Resource</h2>

                        <form enctype="multipart/form-data" style="border: 1px solid #4e4e50;"action="Recourxes.php" method="post">
                            <div class="upload-container">
                                <label for="resource-file" class="upload-button">Choose File</label>
                                <input type="file" id="resource-file" class="upload-input" name="resource-file" accept=".pdf" required>
                            </div>
                            <label for="resource-category">Category:</label>
                            <select id="resource-category" name="resource-category" required>
                                <option value="">Select a category...</option>
                                <option value="cloud_fundamentals">Cloud Fundamentals</option>
                                <option value="computer_architecture">Computer Architecture</option>
                                <option value="core_web_development">Core Web Development</option>
                                <option value="digital_literacy">Digital Literacy & Proficiency</option>
                                <option value="ethics_network_architecture">Ethics and Network Architecture</option>
                                <option value="programme_design">Principles of Programme Design</option>
                                <option value="python_programming">Programming with Python</option>
                                <option value="robotic_development">Robotic Development</option>
                                <!-- Add more categories as needed -->
                            </select>

                            <button type="submit" id="submit">Upload</button>
                        </form>
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $category = $_POST["resource-category"];

                                // Create subfolder if it doesn't exist
                                if (!file_exists("uploads/$category")) {
                                    mkdir("uploads/$category");
                                }

                                $file_name = basename($_FILES["resource-file"]["name"]);
                                $target_file = "uploads/$category/$file_name";

                                if (move_uploaded_file($_FILES["resource-file"]["tmp_name"], $target_file)) {
                                    echo '<div class="upload-message" id="upload-message" style="color: whitesmoke;">The file ' . $file_name . ' has been uploaded successfully.</div>';
                                } else {
                                    echo '<div class="upload-message" id="upload-message">Sorry, there was an error uploading your file.</div>';
                                }
                            }
                         ?>
                </section>  
                
                <section class="resources-section" >
                    <h2>Available Resources</h2>
                    <div class="filter-search">
                        <div class="filter">
                            <label for="category-select" style="padding-top: 10px;">Filter by Category:</label>
                            <select id="category-select" onchange="filterResources()">
                                <option value="all">All</option>
                                <option value="cloud_fundamentals">Cloud Fundamentals</option>
                                <option value="computer_architecture">Computer Architecture</option>
                                <option value="core_web_development">Core Web Development</option>
                                <option value="digital_literacy">Digital Literacy & Proficiency</option>
                                <option value="ethics_network_architecture">Ethics and Network Architecture</option>
                                <option value="programme_design">Principles of Programme Design</option>
                                <option value="python_programming">Programming with Python</option>
                                <option value="robotic_development">Robotic Development</option>
                            </select>
                        </div>
                        <div class="search">
                            <label for="resource-search" style="padding-top: 10px;">Search:</label>
                            <input type="text" id="resource-search" placeholder="Search resources..." id="searchbox">
                        </div>
                    </div>
                    <!-- Resource list pdf -->
                    <ul class="resource-list"  id="resource-list">
                        <?php
                        $resource_dir = 'uploads';
                        $categories = array_filter(glob($resource_dir . '/*'), 'is_dir');

                        foreach ($categories as $category) {
                            $category_name = basename($category);
                            $files = glob($category . '/*.pdf');
                            
                            foreach ($files as $file) {
                                $file_name = basename($file);
                                echo "<li><a href='$file' target='_blank'>$file_name - $category_name</a></li>";
                            }
                        }
                        ?>
                    </ul>

                        
                    
                </section>
                
                


            </main>
        <script src="Recources.js">
            
            function filterResources() {
                var category = document.getElementById("category-select").value;
                var resourceList = document.getElementById("resource-list");
                var resources = resourceList.getElementsByTagName("li");

                for (var i = 0; i < resources.length; i++) {
                    var resource = resources[i];
                    var categoryText = resource.innerText.split(' - ')[1]; // Extract category from resource text

                    if (category === "all" || category === categoryText) {
                        resource.style.display = "block";
                    } else {
                        resource.style.display = "none";
                    }
                }
            }
        </script>    
        <footer>
            <div class="footer-content">
                <h3>CTU-BUDDY</h3>
                <p>CTU-BUDDY incorperates all the needs of a student into a convinient website. There are multiple features including Time Table, Resource sharing and more.</p>
                <ul class="socials">
                <li><a href="https://www.facebook.com/CTUTrainingSolutions/"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/ctu_chatz?lang=en"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://ctutraining.ac.za/"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCQywisNzYCqWfsx1rXDLyoQ"><i class="fa fa-youtube"></i></a></li>
                <li><a href="https://za.linkedin.com/company/ctu-training-solutions-pty-ltd"><i class="fa fa-linkedin-square"></i></a></li>
                </ul>
            </div>
            <div class="footer-bottom">
                <p>copyright &copy; <a href="#">CTU Training Solutions</a>  </p>
                        <div class="footer-menu">
                          <ul class="f-menu">
                            <li><a href="Home.html" class="active">Home</a></li>
                            <li><a href="TimeTable.html">Time Table</a></li>
                            <li><a href="Discussion.html">Discussion</a></li>
                            <li><a href="Recourxes.php">Recources</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                          </ul>
                        </div>
            </div>
    
        </footer>
    </body>
</html>