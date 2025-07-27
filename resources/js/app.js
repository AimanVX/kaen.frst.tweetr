
import "flyonui/flyonui"





document.querySelectorAll('.toggle-btn').forEach(button => {
  button.addEventListener('click', function() {
    const replies = this.nextElementSibling;
    if (replies.style.display === 'none' || replies.style.display === '') {
      replies.style.display = 'block';
    } else {
      replies.style.display = 'none';
    }
  });
});

// Toggle function to show/hide replies on replies
function toggleReplies(tweetId) {
  var replies = document.getElementById('replies-' + tweetId);
  if (replies.classList.contains('hidden')) {
    replies.classList.remove('hidden');
  } else {
    replies.classList.add('hidden');
  }
}

