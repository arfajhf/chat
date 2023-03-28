<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row mt-3">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">
                        Chat Room
                    </div>
                    <div class="card-body">
                        {{-- <form action="" method="post">
                            @csrf --}}
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" id="name">
                            </div><br>
                            <div class="form-group" id="data-message">

                            </div>
                            <div class="form-group">
                                <textarea name="" id="message" class="form-control" placeholder="message"></textarea>
                            </div><br>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" id="send">Send</button>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">

  </script>

  <script src="{{ url('js/app.js') }}"></script>

  <script>
    $(function(){
        const Http = window.axios;
        const Echo = window.Echo;
        const name = $('#name').val();
        const message = $('#message').val();

        $("input, textarea").keyup(function(){
            $(this).removeClass('is-invalid');
        })

        // $('button').click(function(){
        //     if (name.val == '') {
        //         name.addClass('is-invalid');
        //     }else if (message.val == '') {
        //         message.addClass('is-invalid');
        //     }else{
        //         Http.post("{{ url('send') }}",{
        //             'name': name.val(),
        //             'message': message.val()
        //         }).then(()=>{
        //             message.val('');
        //         })
        //     }
        // })

        $("#send").click(function(){
            alert('tombol di klik')
            if (name == '') {
                $('#name').addClass('is-invalid');
            }else if (message == '') {
                $('#message').addClass('is-invalid');
            }else{
                Http.post("{{ url('send') }}",{
                    'name': name,
                    'message': message
                }).then(()=>{
                    $('#message').val('');
                })
            }
        })

        let channel = Echo.channel('cahannel-chat');
        channel.listen('ChatEvent', (data)=>{
            $('#data-message')
            .append(`<strong>${data.message.name}</strong>: ${data.message.message} <br>`)
        })
    })
  </script>
</body>

</html>
