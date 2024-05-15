<?php
        $mysqli = new mysqli("localhost","root","","ctubuddy");

        // Check connection
        if ($mysqli -> connect_errno) {
          echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
          exit();
        }
        
        // Perform query
        if ($result = $mysqli -> query("SELECT * FROM discussion")) {
          // Free result set
          $result -> free_result();
        }
        
        $dataArray=[];

        $query = "SELECT * FROM discussion";
        $result = mysqli_query($mysqli, $query);

        // Loop through the result set and add each row to the array
        while ($row = mysqli_fetch_assoc($result)) {
            $dataArray[] = $row;
        }
        
        $mysqli -> close();

        $mysqli01 = new mysqli("localhost","root","","ctubuddy");

        // Check connection
        if ($mysqli01 -> connect_errno) {
          echo "Failed to connect to MySQL: " . $mysqli01 -> connect_error;
          exit();
        }
        
        // Perform query
        if ($result01 = $mysqli01 -> query("SELECT * FROM comments")) {
          // Free result set
          $result01 -> free_result();
        }

        $dataArray01=[];

        $query01 = "SELECT * FROM comments";
        $result01 = mysqli_query($mysqli01, $query01);

        // Loop through the result set and add each row to the array
        while ($row01 = mysqli_fetch_assoc($result01)) {
            $dataArray01[] = $row01;
        }
        
        $mysqli01 -> close();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the input values from the form
            $name = $_POST['namearea'];
            $message = $_POST['messarea'];
        
            // Create a database connection (modify these parameters as needed)
            $mysqli = new mysqli("localhost", "root", "", "ctubuddy");
        
            // Check if the connection was successful
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                exit();
            }
        
            // Prepare and execute the SQL query to insert data into the table
            $stmt = $mysqli->prepare("INSERT INTO discussion (name, message, curr_date) VALUES (?, ?, NOW())");
            $stmt->bind_param("ss", $name, $message);
        
            if ($stmt->execute()) {
                // Redirect to the same page using GET
                header("Location: {$_SERVER['PHP_SELF']}");
                exit(); // Ensure that no further code is executed after the redirect
            } else {
                echo "Error: " . $stmt->error;
            }
        
            // Close the database connection
            $stmt->close();
            $mysqli->close();
        } else {
            // Handle cases where the form is not submitted
            echo "Form not submitted.";
        }
        ?>        
<html>
    <head>
        <link rel="stylesheet" href="Discussion.css">
        <link rel="stylesheet" href="navbar.css">
        <script src="https://kit.fontawesome.com/62fae0b962.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="footer.css">
        <script type="module" src="Discuss.js"></script>
        <title>
            Discussion
        </title>
    </head>
    <body>
       
            <nav class="nav">
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                  <i class="fa-solid fa-2x fa-bars" style="color: whitesmoke;"></i>
                 </label>
                <label class="logo">CTU-Buddy</label>  
                <ul class="nav-links">
                  <li><a href="Home.html">Home</a></li>
                  <li><a href="TimeTable.html">Time Table</a></li>
                  <li><a href="Discussion.php" class="active">Discussion</a></li>
                  <li><a href="Recourxes.php">Recources</a></li>
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                </ul>
                </nav>
            <main>
                <h1 class="h1">Discuss your work</h1>
                <br><br>
                <div id="discussionBoard">
                    <!-- Discussion threads will be dynamically added here -->
                    <br>
                    <button class="topmess" onclick="showMore('up')" id="topmess">See more</button>

                    <div class="message" id="c1">
                        <p class="date" id="d1">2023/10/03 Default</p>
                        <br>
                        <p class="paragraph" id="p1"> <br>This is a automated message</p>
                        <button class="comment" onclick="showtop1(true)" id="test">Comments</button>
                        <div class="comments 1" id="1">
                            <button class="topcomm" id="top1" onclick="showtop1(false,'up')">See more</button>

                            <div class="comm">
                                <p class="paragraph comment" id="11">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment"id="12">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="13">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="14">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="15">This is a comment</p>
                            </div>

                            <button class="bottomcomm" id="bott1" onclick="showtop1(false,'down')">See more</button>

                            <textarea required class="questionInput" rows="4" placeholder="Post your comments here" id="text1"></textarea>
                            <button type="submit" style="margin-left: 47.5%;" class="submitQuestion" onclick="sub1()">Submit</button>
                        </div>
                    </div>

                    <div class="message" id="c2">
                        <p class="date" id="d2">2023/10/03 Default</p>
                        <br>
                        <p class="paragraph" id="p2"> <br>This is a automated message</p>
                        <button class="comment" onclick="showtop2(true)" id="test">Comments</button>
                        <div class="comments"id="2">
                            <button class="topcomm" id="top2" onclick="showtop2(false,'up')">See more</button>

                            <div class="comm">
                                <p class="paragraph comment"id="21">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment"id="22">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment"id="23">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment"id="24">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="25">This is a comment</p>
                            </div>

                            <button class="bottomcomm" id="bott2" onclick="showtop2(false,'down')">See more</button>
                        
                            <textarea required class="questionInput" rows="4" placeholder="Post your comments here" id="text2"></textarea>
                            <button type="submit" style="margin-left: 47.5%;" class="submitQuestion" onclick="sub2()">Submit</button>
                        </div>
                    </div>

                    <div class="message" id="c3">
                        <p class="date" id="d3">2023/10/03 Default</p>
                        <br>
                        <p class="paragraph" id="p3"> <br>This is a automated message</p>
                        <button class="comment" onclick="showtop3(true)" id="test">Comments</button>
                        <div class="comments" id="3">
                            <button class="topcomm" id="top3" onclick="showtop3(false,'up')">See more</button>

                            <div class="comm">
                                <p class="paragraph comment" id="31">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="32">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="33">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment"id="34">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="35">This is a comment</p>
                            </div>

                            <button class="bottomcomm" id="bott3" onclick="showtop3(false,'down')">See more</button>

                            <textarea required class="questionInput" rows="4" placeholder="Post your comments here" id="text3"></textarea>
                            <button type="submit" style="margin-left: 47.5%;" class="submitQuestion" onclick="sub3()">Submit</button>
                        </div>
                    </div>

                    <div class="message" id="c4">
                        <p class="date" id="d4">2023/10/03 Default</p>
                        <br>
                        <p class="paragraph" id="p4"> <br>This is a automated message</p>
                        <button class="comment" onclick="showtop4(true)" id="test">Comments</button>
                        <div class="comments"id="4">
                            <button class="topcomm" id="top4" onclick="showtop4(false,'up')">See more</button>

                            <div class="comm">
                                <p class="paragraph comment" id="41">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="42">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="43">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="44">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="45">This is a comment</p>
                            </div>

                            <button class="bottomcomm" id="bott4" onclick="showtop4(false,'down')">See more</button>

                            <textarea required class="questionInput" rows="4" placeholder="Post your comments here" id="text4"></textarea>
                            <button type="submit" style="margin-left: 47.5%;" class="submitQuestion" onclick="sub4()">Submit</button>
                        </div>
                    </div>

                    <div class="message" id="c5">
                        <p class="date" id="d5">2023/10/03 Default</p>
                        <br>
                        <p class="paragraph" id="p5"> <br>This is a automated message</p>
                        <button class="comment" onclick="showtop5(true)" id="test">Comments</button>
                        <div class="comments"id="5">
                            <button class="topcomm" id="top5" onclick="showtop5(false,'up')">See more</button>

                            <div class="comm">
                                <p class="paragraph comment" id="51">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="52">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment"id="53">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment"id="54">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment"id="55">This is a comment</p>
                            </div>

                            <button class="bottomcomm" id="bott5" onclick="showtop5(false,'down')">See more</button>

                            <textarea required class="questionInput" rows="4" placeholder="Post your comments here" id="text5"></textarea>
                            <button type="submit" style="margin-left: 47.5%;" class="submitQuestion" onclick="sub5()">Submit</button>
                        </div>
                    </div>

                    <div class="message" id="c6">
                        <p class="date" id="d6">2023/10/03 Default</p>
                        <br>
                        <p class="paragraph" id="p6"> <br>This is a automated message</p>
                        <button class="comment" onclick="showtop6(true)" id="test">Comments</button>
                        <div class="comments"id="6">
                            <button class="topcomm" id="top6" onclick="showtop6(false,'up')">See more</button>

                            <div class="comm">
                                <p class="paragraph comment" id="61">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment" id="62">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment"id="63">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment"id="64">This is a comment</p>
                            </div>

                            <div class="comm">
                                <p class="paragraph comment"id="65">This is a comment</p>
                            </div>

                            <button class="bottomcomm" id="bott6" onclick="showtop6(false,'down')">See more</button>
                            <textarea required class="questionInput" rows="4" placeholder="Post your comments here" id="text6"></textarea>
                            <button type="submit" style="margin-left: 47.5%;" class="submitQuestion" onclick="sub6()">Submit</button>
                        </div>
                    </div>

                    <button class="bottommess" id="bottommess" onclick="showMore('down')">See more</button>
                </div>
            <div>
                <h2 class="h2">Post your Questions</h2>

                <form id="discussForm" method="POST">
                    <label for="name" class="headers">Name:</label>
                    <input name="namearea" type="text" id="name" required placeholder="Enter your name here" id="namearea"><br>
    
                    <label for="question" class="headers">Question:</label>
                    <textarea name="messarea" required class="questionInput" rows="4" placeholder="Post your questions here" id="messarea"></textarea>
                    <button  style="margin-left: 47.5%;" class="submitQuestion" onclick="submitmess()">Submit</button>
                </form>
                
            </div>
    </main>
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
                            <li><a href="Discussion.php">Discussion</a></li>
                            <li><a href="Recourxes.php">Recources</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                          </ul>
                        </div>
            </div>
    
        </footer>

        <script>
            var elems = document.getElementsByClassName('comments');
            for (var i=0;i<elems.length;i+=1){
            elems[i].style.display = 'none';
            }

            var elems = document.getElementsByClassName('bottomcomm');
            for (var i=0;i<elems.length;i+=1){
            elems[i].style.display = 'none';
            }       

            var message = <?php echo json_encode($dataArray); ?>;
           
            var comments = <?php echo json_encode($dataArray01); ?>;

            var NumRows = message.length;
            var RowsLeft = message.length;
            var Iter =0;
            var CurrIndex = message.length -1; // Initialize CurrIndex to the last index

            window.onload = function() {
                displayMessages(CurrIndex);
                
            };

            function displayMessages(startIndex) {
                if (startIndex <= 5) {
                    document.getElementById("topmess").style.display = "none";    
                }
                else {
                    document.getElementById("topmess").style.display = "block";
                }
                if (message.length - startIndex + 1 <= 6 ){
                    document.getElementById("bottommess").style.display = "none";
                }
                else{
                    document.getElementById("bottommess").style.display = "block";
                }
                var icount = 1;
                for (var i = 6; i >= 1; i--) {
                    var messageIndex = startIndex - i + 1; // Adjust the calculation
                    var divId = "d" + icount;
                    var pId = "p" + icount;
                   
                    if (messageIndex >= 0 && messageIndex < message.length) {
                        document.getElementById("c"+icount).style.display = 'block'; // Show the element
                        document.getElementById(divId).innerHTML = message[messageIndex].name + " " + message[messageIndex].curr_date;
                        document.getElementById(pId).innerHTML = message[messageIndex].message;
                    } else {
                        // Hide the element if there are no more messages
                        document.getElementById("c"+icount).style.display = 'none';
                    } 
                    icount++;
                }
            }

            function showMore(direction) {
                if (direction === "up") {
                    CurrIndex -= 6;
                } else if (direction === "down") {
                    CurrIndex += 6;
                }
                
                displayMessages(CurrIndex);

            }
            function togglecomments(ID){
                var x = document.getElementById(ID);
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
            function showcomments(currmess,currcomm,currpos){
                    var refComm = currcomm;
                    var temparr1 =[];
                    var count1 = 0;
                    for (var j = 0;j<comments.length;j++){

                        if (comments[j].id == refComm){
                            count1 +=1;
                            temparr1.push(comments[j].comm);
                        } 
                    }
                    if (count1 - currpos*5 + 1 > 5){
                        document.getElementById("top"+currmess).style.display = "block";
                    }
                    else{
                        document.getElementById("top"+currmess).style.display = "none";
                    }

                    if (count1 - currpos*5 + 1 <= 5){
                        document.getElementById("top"+currmess).style.display = "none";
                    }
                    else{
                        document.getElementById("top"+currmess).style.display = "block";
                    }
                    var k = currpos*5+1;
                    for (var i = 1;i <= 5;i++){ 
                        if (count1 >= k){
                            document.getElementById(""+currmess+i).style.display = "block";
                            document.getElementById(""+currmess+i).innerHTML = temparr1[temparr1.length - k]; 
                        }
                        else{
                            document.getElementById(""+currmess+i).style.display = "none";
                        }
                        k++;
                    }
            }
            var currpos1 =0;
            function showtop1(BtnClicked,upordown = ''){
                if (BtnClicked == true){
                    currpos1 =0;
                    togglecomments('1')
                }
                else{
                    if (upordown == 'up'){
                        currpos1++
                    }
                    else{
                        currpos1--
                    }
                }
                showcomments('1',CurrIndex-4,currpos1);
            }
            var currpos2 =0;
            function showtop2(BtnClicked, upordown = ''){
                if (BtnClicked == true){
                    currpos2 =0;
                    togglecomments('2')
                }
                else{
                    if (upordown == 'up'){
                        currpos2++
                    }
                    else{
                        currpos2--
                    }
                }
                showcomments('2',CurrIndex-3,currpos2);
            }
            var currpos3 =0;
            function showtop3(BtnClicked,upordown = ''){
                if (BtnClicked == true){
                    currpos3 =0;
                    togglecomments('3');
                }
                else{
                    if (upordown == 'up'){
                        currpos3++
                    }
                    else{
                        currpo3--
                    }
                }
                showcomments('3',CurrIndex-2,currpos3);
            }
            var currpos4 =0;
            function showtop4(BtnClicked,upordown = ''){
                if (BtnClicked == true){
                    currpos4 =0;
                    togglecomments('4');
                }
                else{
                    if (upordown == 'up'){
                        currpos4++
                    }
                    else{
                        currpos4--
                    }
                }
                showcomments('4',CurrIndex-1,currpos4);
            }
            var currpos5 =0;
            function showtop5(BtnClicked,upordown = ''){
                if (BtnClicked == true){
                    currpos5 =0;
                    togglecomments('5');
                }
                else{
                    if (upordown == 'up'){
                        currpos5++
                    }
                    else{
                        currpos5--
                    }
                }
                showcomments('5',CurrIndex,currpos5);
            }
            var currpos6 =0;
            function showtop6(BtnClicked,upordown = ''){
                if (BtnClicked == true){
                    currpos6 =0;
                    togglecomments('6')
                }
                else{
                    if (upordown == 'up'){
                        currpos6++
                    }
                    else{
                        currpos6--
                    }
                }
                showcomments('6',CurrIndex +1,currpos6);
            }
       
            function sub1(messageid = CurrIndex - 5,numcomm=1) {                

                if (numcomm == 1){
                    if (document.getElementById("text1").value != ""){
                       var thecomment = document.getElementById("text1").value; 
                    }
                    else {
                        alert("Please enter a value");
                    }            
                }
                else if(numcomm == 2){
                    if (document.getElementById("text2").value != ""){
                       var thecomment = document.getElementById("text2").value; 
                    }
                    else {
                        alert("Please enter a value");
                    }        
                }
                else if(numcomm == 3){
                    if (document.getElementById("text3").value != ""){
                       var thecomment = document.getElementById("text3").value; 
                    }
                    else {
                        alert("Please enter a value");
                    }          
                }
                else if(numcomm == 4){
                    if (document.getElementById("text4").value != ""){
                       var thecomment = document.getElementById("text4").value; 
                    }
                    else {
                        alert("Please enter a value");
                    }          
                }
                else if(numcomm == 5){
                    if (document.getElementById("text5").value != ""){
                       var thecomment = document.getElementById("text5").value; 
                    }
                    else {
                        alert("Please enter a value");
                    }         
                }
                else if(numcomm == 6){
                    if (document.getElementById("text6").value != ""){
                       var thecomment = document.getElementById("text6").value; 
                    }
                    else {
                        alert("Please enter a value");
                    }          
                }

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                        } else {
                            console.error("Error: " + xhr.status);
                        }
                    }
                };

                var url = "insert_comment.php?comment=" + encodeURIComponent(thecomment) + "&messageid=" + encodeURIComponent(messageid);
                xhr.open("GET", url, true);
                xhr.send();
                alert("Comment Submitted!!")
            }
       

        function sub2() {
            sub1(CurrIndex - 4,2);
        }

        function sub3() {
            sub1(CurrIndex - 3,3);
        }

        function sub4() {
            sub1(CurrIndex - 2,4);
        }

        function sub5() {
            sub1(CurrIndex - 1,5);
        }

        function sub6() {
            sub1(CurrIndex,6);
        }
        
       


        </script>
    </body>
</html>