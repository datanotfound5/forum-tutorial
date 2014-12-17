<?php
	function replylink($cid, $scid, $tid) {
		echo "<p><a href='/forum/replyto/".$cid."/".$scid."/".$tid."'>Reply to this Post</a></p>";
	}

	function replytopost($cid, $scid, $tid) {
		echo '<div class="content"><form action="/forum/addreply.php?cid='.$cid.'&scid='.$scid.'&tid='.$tid.'" method="POST">
			  <p>Comment: </p>
			  <textarea cols="80" rows="5" id="comment" name="comment"></textarea><br />
			  <input type="submit" value="add comment" />
			  </form></div>';
	}

	function dispreplies($cid, $scid, $tid) {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT replies.author, comment, replies.date_posted FROM categories, subcategories, topics, replies WHERE ($cid = replies.category_id) AND ($scid = replies.subcategory_id) AND ($tid = replies.topic_id) AND ($cid = categories.cat_id) AND ($scid = subcategories.subcat_id) AND ($tid = topics.topic_id) ORDER BY reply_id DESC");
		if (mysqli_num_rows($select) != 0) {
			echo "<div class='content'><table class='reply-table' width='100%'>";
			$ith_row = 0;
			while ($row = mysqli_fetch_assoc($select)) {
				echo nl2br("<tr><th width='15%'>".$row['author']."</td><td>".$row['date_posted']."\n".$row['comment']."\n\n</td></tr>");
			}
			echo "</table></div>";
		}
	}

	function countReplies($cid, $scid, $tid) {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT category_id, subcategory_id, topic_id FROM replies WHERE ".$cid." = category_id AND ".$scid." = subcategory_id AND ".$tid." = topic_id");
		return mysqli_num_rows($select);
	}
?>