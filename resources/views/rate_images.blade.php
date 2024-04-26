<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bewerten</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .magazin ol,.magazin ul{font-family:"Times New Roman",Times,serif;font-size:20px;margin:1.56em 20px 0}.magazin ul,.magazin_paragraph,blockquote{letter-spacing:-.003em;line-height:28px}.link,.magazin a{text-decoration:underline}.magazin_headline,.magazin_paragraph,blockquote{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif}.no-border-blockquote{border-left:0 solid #000!important}blockquote{font-size:20px;margin:1.56em 0 0;background-color:#fafafa;color:#000;border-left:8px solid #000;padding:42px}.magazin ul{list-style-type:disc}.magazin a{cursor:pointer!important;transition:.4s}.magazin a:hover{opacity:.8}.magazin ol{letter-spacing:-.003em;line-height:30px}.magazin_paragraph{font-size:19px;font-weight:400;margin:1.56em 0 0!important}.magazin_headline{font-weight:600;margin:1.56em 0 1em!important;letter-spacing:0;font-size:44px}@media only screen and (max-width:767px){.magazin_headline{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-weight:600;margin:1.56em 0 1em!important;letter-spacing:0;font-size:24px}.magazin ul{font-size:18px!important;line-height:28px}blockquote{padding:42px 28px;font-size:18px}.fix-12-12,.fix-8-12{padding-left:9px;padding-right:9px}.fix-10-12,.magazin{padding-right:0}.fix-10-12{padding-left:0}}.magazine2 ul{list-style-type:none;padding-left:0;margin-bottom:0!important}.magazine2 ul li strong{font-size:18px}.magazine2 ul li{line-height: 28px; margin:10px 0 5px 5px;padding:0 0 0 25px!important;font-size:19px; position: relative;}.magazine2 ul li:before{font-size: 24px;content:"\2022";color:#e08e69;display:inline-block;position: absolute;left: 0px;}.magazine2 ul li:first-child{margin-top:30px}
        </style>
            
    <link rel="stylesheet" href="{{ asset('css/chessboard-1.0.0.min.css') }}">
    @livewireStyles
</head>
<body>
    <section class="slide padding-top-md-4 padding-bottom-md-4" style="background: #F6F0E7; height: 100vw">
        <div class="content">
          <div class="container">
            <div class="wrap">
                <div class="fix-11-12 center">
                    <!-- rate_images.blade.php -->
                    <form id="rating_form" action="{{ route('rate.images.store', ['image_number' => $imageNumber]) }}" method="POST">
                        @csrf
                        <ul class="flex">
                            <li class="col-6-12">                                    
                                <img src="{{ asset($imagePath) }}" alt="Image" style="margin-top:60px">
                            </li>                                    
                            <li class="col-6-12">
                                <div id="myBoard"></div>
                               </li>
                            </ul> 
                        </div>
                        <div class="fix-8-12 center"> 
        <div>
            <label for="answer" class="label">Erklären Sie Ihre Analogie:</label>
            <input type="text" name="answer" id="answer" class="input" required>
<br>
            <label for="answer" class="label">Ihr Schachbrett:</label>
            <input type="text" id="screenshot_input" name="rating" class="input" readonly>
        </div>
        <!-- Hidden fields to store image path and participant expertise -->
        <input type="hidden" name="image" value="{{ asset($imagePath) }}">
        <button type="submit" id="submit_button" class="box-weiter" style="margin-top: 25px; margin-left: 0px; padding: 15px 45px 15px 45px">Bestätigen</button>
</form>

    </div> 
</div>
</div>
</div>
</section> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/chessboard-1.0.0.js') }}"></script> 
    @livewireScripts
    <script>
        var board = Chessboard('myBoard', {
            draggable: true,
            dropOffBoard: 'trash',
            sparePieces: true,
            onDrop: onDrop
            })
            function onDrop(source, target) {
                // Add a short delay before capturing the FEN notation
                setTimeout(function() {
                    // Get the current state of the chessboard in FEN notation
                    var fen = board.fen();
                    // Set FEN notation as value of hidden input field
                    document.getElementById('screenshot_input').value = fen;
                }, 200); // Adjust the delay time as needed (in milliseconds)
            }
        </script>
</body>
</html>
