import { createConnection } from 'mysql';

const connection = createConnection({
  // Your database configuration
});

connection.connect((err) => {
  if (err) {
    console.error('Error connecting to database:', err);
    return;
  }
  console.log('Connected to database');
});

// Function to display existing comments (you can load these from a server)
function displayComments(){
    const commentsDiv = document.getElementById("discussionBoard");
    // Replace this with code to fetch comments from the server
    // For now, let's assume you have an array of comments
    const comments = [
        {name: "User1", text: "This is a comment."},
        {name: "User2", text: "Another comment here."}
    ];

    commentsDiv.innerHTML = "";

    comments.forEach(comment => {
        const commentElement = document.createElement("div");
        commentElement.classList.add("comment");
        
        const strongElement = document.createElement("strong");
        strongElement.textContent = `${comment.name}:`;
        
        const textNode = document.createTextNode(` ${comment.text}`);
        
        commentElement.appendChild(strongElement);
        commentElement.appendChild(textNode);
        
        commentsDiv.appendChild(commentElement);
    });
}

// Function to handle new comment submission
function submitComment(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    const nameInput = document.getElementById("name");
    const commentInput = document.getElementById("questionInput");
    
    const name = nameInput.value;
    const comment = commentInput.value;

    // You can send the comment data to your server here for storage
    // Replace this with code to post comments to your server

    // For now, let's add the comment to the frontend
    const commentsDiv = document.getElementById("discussionBoard");
    const commentElement = document.createElement("div");
    commentElement.classList.add("comment");
    
    const strongElement = document.createElement("strong");
    strongElement.textContent = `${name}:`;
    
    const textNode = document.createTextNode(` ${comment}`);
    
    commentElement.appendChild(strongElement);
    commentElement.appendChild(textNode);
    
    commentsDiv.appendChild(commentElement);

    // Clear the form inputs
    nameInput.value = "";
    commentInput.value = "";
}

// Display existing comments when the page loads
displayComments();

// Add a submit event listener to the comment form
const commentForm = document.getElementById("discussForm");
commentForm.addEventListener("submit", submitComment);
