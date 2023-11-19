function getCurrentDateTime() {
    var now = new Date();
    var year = now.getFullYear();
    var month = ('0' + (now.getMonth() + 1)).slice(-2);
    var day = ('0' + now.getDate()).slice(-2);
    var hours = ('0' + now.getHours()).slice(-2);
    var minutes = ('0' + now.getMinutes()).slice(-2);
    var seconds = ('0' + now.getSeconds()).slice(-2);

    var currentDateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    return currentDateTime;
}

function checkForNewPosts() {
    var currentDateTime = getCurrentDateTime();

    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/new-post', // Replace with your backend endpoint
        type: 'GET',
        data: { currentDateTime: currentDateTime },
        success: function(response) {
            if (response.hasNew) {
                let elem = document.querySelector('#toast-success');
                document.querySelector('#toast-notif').innerHTML = (response.posts) ? 'There is a new post.' : 'There is a new question posted.'; 
                elem.classList.toggle('hidden')
                elem.classList.toggle('flex')
                setTimeout(() => {
                    elem.classList.toggle('hidden')
                    elem.classList.toggle('flex')
                }, 3000);
            }
        },
        error: function(error) {
            console.error('Error checking for new posts:', error);
        },
        complete: function() {
            // Schedule the next check after 3 seconds
            setTimeout(function() {
                checkForNewPosts();
            }, 10000);
        }
    });
}

// Call the function to start checking for new posts
checkForNewPosts();
