function deleteUser(userId) {
    if (confirm("Are you sure you want to delete this user?")) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_user.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response here if needed
                location.reload(); // Refresh the page after deletion
            }
        };
        xhr.send("id=" + userId);
    }
}
