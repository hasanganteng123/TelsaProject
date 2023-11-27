

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chatbot</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>

<body>
    <div class="wrapper">
        <div class="title">Telsa</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hai, ada yang bisa saya bantu? </p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="text-pesan" type="text" placeholder="Silahkan masukkan pertanyaan anda disini..." required>
                <button id="send-btn">Kirim</button>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function(){
        //jika tombol kirim diklik
        $("#send-btn").on("click", function(){
            //mengambil inputan
            $pesan = $("#text-pesan").val();
            //menampung pesan ke variabel
            $msg = '<div class="user-inbox inbox"> <div class ="msg-header"><p>'+ $pesan +'</p></div> </div>'; 
            //memasukkan ke form chat
            $(".form").append($msg);
            //kosongkan kolom chat
            $("#text-pesan").val('');

            $.ajax({
                url : 'pesan.php',
                type : 'POST',
                data : 'isi_pesan=' + $pesan, 
                success : function(result){
                    //jika sukses ambil data, tampung ke dalam variabel balasan
                    $balasan = ' <div class="bot-inbox inbox"> <div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +' </p></div></div>';
                    //form chat
                    $(".form").append($balasan);
                    //buat form otomatis scroll ke bawah jika ada pesan baru 
                    $(".form").scrollTop($(".form")[0].scrollHeight);
            }

            });
        });

    })
</script>
