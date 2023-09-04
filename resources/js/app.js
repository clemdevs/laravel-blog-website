import * as bootstrap from 'bootstrap';

document.addEventListener("DOMContentLoaded", (e) => {
    const categoryFilter = document.getElementById("category");
    const categoryForm = document.getElementById("categoryForm");

    if(categoryForm){
        categoryFilter.addEventListener('change', () => categoryForm.submit() );
    }

    const replyForms = document.querySelectorAll('.reply-form');
    if(replyForms){
        replyForms.forEach(form => {
            form.style.display = 'none';
        });
    }

    const replyLinks = document.querySelectorAll('.reply-link');
    const nestedReplyLinks = document.querySelectorAll('.reply-link-nested');

    if(replyForms){

        replyLinks.forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                const commentId = link.getAttribute('data-comment-id');
                const replyForm = document.querySelector(`.reply-form[data-comment-id="${commentId}"]`);
                if (replyForm.style.display === 'none' || replyForm.style.display === '') {
                    replyForm.style.display = 'block';
                } else {
                    replyForm.style.display = 'none';
                }
            });
        });

        nestedReplyLinks.forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                const parentId = link.getAttribute('data-reply-id');
                const replyForm = document.querySelector(`.reply-form[data-parent-reply-id="${parentId}"]`);
                if (replyForm.style.display === 'none' || replyForm.style.display === '') {
                    replyForm.style.display = 'block';
                } else {
                    replyForm.style.display = 'none';
                }
            });
        });
    }

});
