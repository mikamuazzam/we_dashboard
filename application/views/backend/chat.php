<link href="<?php echo base_url(); ?>assets/css/chat.css" rel="stylesheet" media='all'>
<script>
$(function() {
   
   $('#isian').scrollTop($('#isian')[0].scrollHeight);
  
});
</script>
<body>


           
                    <div id="chatBox" ></div>      
              

    
    <script>
        $(document).ready(function() {

            $('#isian').scrollTop($('#isian')[0].scrollHeight);
            // Load initial chat messages
            loadChatMessages();

            // Periodically load new chat messages
            setInterval(loadChatMessages, 1000);

            // Submit chat message
            $('#chatForm').submit(function(e) {
                e.preventDefault();

                
                var message = $('#message').val();

                saveChatMessage( message);

                // Clear input fields
                $('#message').val('');
            });
        });

        // Function to load chat messages
        function loadChatMessages() {
            var user_id='<?= $this->session->userdata('user_log_id'); ?>';
            $.ajax({
                url: '<?= base_url('chat/getmessages') ?>',
                dataType: 'json',
                success: function(response) {
                    var chatBox = $('#chatBox');
                    chatBox.empty();

                    for (var i = 0; i < response.length; i++) {
                        var message = response[i].message;
                        var em_image = response[i].em_image;
                        var senderName = response[i].from;
                        var createdAt = response[i].sent;
                        var tgl =response[i].tgl;
                        var jam =response[i].jam;
                        var nama =response[i].first_name;
                       
                        var tgl_now = '<?= date ("Y-m-d");?>';
                        if(tgl==tgl_now) {createdAt = jam ; }
                        if(user_id != senderName){
                        var chatMessage2 ='<div class="d-flex flex-row p-1"><img src="<?php echo base_url(); ?>assets/images/users/' + em_image + '" alt="'+nama+'" width="40" height="40" style=" border-radius: 50%;"><div class="chat ml-2 p-1" style="width: 300px; ">' + message +'<div style="text-align:right; font-size: 8px;">'+ createdAt +'</div></div></div>'
                        }
                        else
                        {
                            var chatMessage2 ='<div class="d-flex flex-row p-1"><div class="bg-white mr-2 p-1" style="width: 300px; text-align: right;"><span class="text-muted">' + message + '<div style="text-align:right; font-size: 8px;">'+ createdAt +'</div></div> </span><img src="<?php echo base_url(); ?>assets/images/users/' + em_image + '" alt="'+nama+'" width="40" height="40" style=" border-radius: 50%;">'
                        }
                        var chatMessage = '<p><strong>' + senderName + ':</strong> ' + message + ' (' + createdAt + ')</p>';
                        chatBox.append(chatMessage2);
                    }
                }
            });
            $('#message').focus();
        }

        // Function to save chat message
        function saveChatMessage( message) {
            $.ajax({
                url: '<?= base_url('chat/savemessage') ?>',
                method: 'POST',
                data: {
                   
                    message: message
                },
                success: function(response) {
                    console.log('Chat message saved');
                }
            });
        }
    </script>
</body>
</html>
