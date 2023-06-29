<?php
error_reporting(0);
include("connection.php");

// Get the user id from the session or any other source
$userId = $_SESSION['uid'];

$sel = mysqli_query($con, "SELECT * FROM `blog` ORDER BY id DESC");
while ($row = mysqli_fetch_array($sel)) {
	$sel1 = mysqli_query($con, "SELECT * FROM `student` WHERE `id`='$row[uid]'");
	$row1 = mysqli_fetch_array($sel1);

	// Check if the user has already liked the post
	$checkQuery = mysqli_query($con, "SELECT * FROM `reaction` WHERE `user_id`='$userId' AND `blog_id`='$row[id]'");
	$isLiked = mysqli_num_rows($checkQuery) > 0;
?>
	<style>
		.like-button__btn {
			display: inline-block;
			background-color: #fff;
			color: #8c8b8b;
			border: 0px solid #ccc;
			font-size: 14px;
			cursor: pointer;
			transition: color 0.1s;
		}

		.like-button__btn:hover {
			color: #333;
			transition: color 0.1s;
		}

		.like-button__btn.liked {
			color: #1877F2;
			border: none;
			box-shadow: none;
		}

		.comment-button__btn {
			display: inline-block;
			background-color: #fff;
			color: #8c8b8b;
			border: 0px solid #ccc;
			font-size: 14px;
			cursor: pointer;
			transition: color 0.1s;
			margin-left: 10px;
		}

		.comment-button__btn:hover {
			color: #333;
			transition: color 0.1s;
		}

		.comment-button__btn.liked {
			color: #1877F2;
			border: none;
			box-shadow: none;
		}

		.comment-form {
			margin-top: 10px;
		}

		.comment-form textarea {
			width: 100%;
			resize: vertical;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
		}

		.comment-form button {
			background-color: #1877F2;
			color: #fff;
			border: none;
			padding: 8px 16px;
			border-radius: 4px;
			cursor: pointer;
			font-size: 12px;
			transition: background-color 0.3s;
			display: inline-flex;
			align-items: center;
			margin-top: 10px;
		}

		.comment-form button:hover {
			background-color: #0d6aad;
		}

		.comment-form button:disabled {
			background-color: #ccc;
			cursor: not-allowed;
		}

		.comment-form button:disabled:hover {
			background-color: #ccc;
		}

		.comment-form button i {
			margin-right: 5px;
		}

		.comment-form button span {
			display: inline-block;
			margin-left: 5px;
		}

		.comment-section {
			margin-top: 10px;
		}

		.comment-section .comments-list {
			list-style: none;
			padding: 0;
			margin-top: 10px;
		}

		.comment-section .comments-list li {
			margin-bottom: 0px;
			padding-bottom: 5px;
		}

		.comment-section .comments-list li:last-child {
			margin-bottom: 0;
		}

		.comment-section .comment {
			border: 1px solid #ccc;
			border-radius: 4px;
			padding: 10px;
		}

		.comment-section .comment .comment-info {
			margin-bottom: 5px;
		}

		.comment-section .comment .comment-text {
			margin-bottom: 5px;
		}
	</style>
	<div class="central-meta item" style="border-radius: 10px; padding-bottom: 20px">
		<div class="user-post">
			<div class="friend-info">
				<figure>
					<img src="admin/user_tbl/uploads/<?php echo $row1['image']; ?>" alt="">
				</figure>
				<div class="friend-name">
					<?php
					if ($row1['id'] == $_SESSION['uid']) {
						echo '<ins><a href="profile.php" title="">' . $row1['name'] . '</a></ins>';
					} else {
						echo '<ins><a href="frnd-prof.php?id=' . $row1['id'] . '" title="">' . $row1['name'] . '</a></ins>';
					}
					?>
					<span>published: <?php echo $row['date'] ?></span>
				</div>
				<div class="post-meta">
					<img src="blog/<?php echo $row['image']; ?>" style="width:678px; height:366px; border-radius: 5px;" alt="">
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<h5><?php echo $row['title'] ?></h5>
					<div class="description">
						<p><?php echo $row['description'] ?></p>
					</div>
					<div class="like-button">
						<button class="like-button__btn <?php echo $isLiked ? 'liked' : ''; ?>" onclick="handleLikeButtonClick(<?php echo $row['id']; ?>, this)">
							<i class="fa fa-thumbs-o-up"></i> <?php echo $isLiked ? 'Liked' : 'Like'; ?>
						</button>
						<button class="comment-button__btn" onclick="showCommentForm(<?php echo $row['id']; ?>)"><i class="fa fa-comment-o"></i> Comment</button> <!-- Moved comment button here -->
					</div>
					<div id="comment-section-<?php echo $row['id']; ?>" style="font-size: 14px"; class="comment-section"></div>
				</div>
			</div>
		</div>
	</div>

<?php
}
?>

<script>
	function handleLikeButtonClick(postId, button) {
		// Send an AJAX request to check if the user has already liked the post
		var xhr = new XMLHttpRequest();
		xhr.open('GET', 'checklike.php?postId=' + postId);
		xhr.onload = function() {
			if (xhr.status === 200) {
				var response = JSON.parse(xhr.responseText);
				if (response.liked) {
					// User has already liked the post, update the button style
					button.innerHTML = '<i class="fa fa-thumbs-o-up"></i> Liked';
					button.classList.add('liked');
					button.onclick = function() {
						undoLike(postId, button);
					};
				} else {
					// User has not liked the post, handle the like button click event
					likePost(postId, button);
				}
			}
		};
		xhr.send();
	}

	function likePost(postId, button) {
		// Send an AJAX request to like the post
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'like.php');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onload = function() {
			if (xhr.status === 200) {
				// Update the button style when liked
				button.innerHTML = '<i class="fa fa-thumbs-o-up"></i> Liked';
				button.classList.add('liked');
				button.onclick = function() {
					undoLike(postId, button);
				};
			}
		};
		xhr.send('postId=' + postId);
	}

	function undoLike(postId, button) {
		// Send an AJAX request to undo the like
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'undolike.php');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onload = function() {
			if (xhr.status === 200) {
				var response = JSON.parse(xhr.responseText);
				if (response.success) {
					// Update the button style when like undone
					button.innerHTML = '<i class="fa fa-thumbs-o-up"></i> Like';
					button.classList.remove('liked');
					button.onclick = function() {
						likePost(postId, button);
					};
				}
			}
		};
		xhr.send('postId=' + postId);
	}

	function showCommentForm(postId) {
		var commentSection = document.getElementById('comment-section-' + postId);
		if (commentSection.innerHTML.trim() === '') {
			// Comment form not loaded yet, fetch and display it
			var commentForm = document.createElement('div');
			commentForm.innerHTML = '<div class="comment-form">' +
				'<textarea placeholder="Write a comment..." required></textarea>' +
				'<button type="submit" onclick="postComment(' + postId + ', this)">Post</button>' +
				'</div>';
			commentSection.appendChild(commentForm);

			// Fetch and display existing comments
			fetchComments(postId, commentSection);
		} else {
			// Comment form already loaded, toggle visibility
			commentSection.innerHTML = '';
		}
	}

	function fetchComments(postId, commentSection) {
		var xhr = new XMLHttpRequest();
		xhr.open('GET', 'fetchcomments.php?postId=' + postId);
		xhr.onload = function() {
			if (xhr.status === 200) {
				var comments = JSON.parse(xhr.responseText);
				if (comments.length > 0) {
					var commentsList = document.createElement('ul');
					commentsList.className = 'comments-list';
					comments.forEach(function(comment) {
						var commentItem = document.createElement('li');
						commentItem.innerHTML = '<strong>' + comment.name + '</strong>: ' + comment.comment;
						commentsList.appendChild(commentItem);
					});
					commentSection.appendChild(commentsList);
				}
			}
		};
		xhr.send();
	}

	function postComment(postId, button) {
		var commentForm = button.parentNode;
		var commentInput = commentForm.querySelector('textarea');
		var comment = commentInput.value.trim();
		if (comment !== '') {
			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'addcomment.php');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200) {
					// Clear the comment form and fetch updated comments
					commentInput.value = '';
					var commentSection = commentForm.parentNode;
					commentSection.innerHTML = '';
					fetchComments(postId, commentSection);
				}
			};
			xhr.send('postId=' + postId + '&comment=' + encodeURIComponent(comment));
		}
	}
</script>