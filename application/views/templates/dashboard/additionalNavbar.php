<div id="main-nav" class="relative md:absolute  bg-white overflow-hidden z-50 h-16 w-16 border rounded-lg transition-all duration-1000">
   <div class="relative">
    <div class="bg-white w-auto h-20 absolute px-2 pb-4 flex justify-between items-center">
            <button onclick="additionalMenu();" class="text-gray-800 hover:text-blue-500 focus:scale-125 transition-all duration-1000 focus:text-blue-500 hover:scale-125 px-4 py-2 outline-none">
                <i id="right-icon" class="fas fa-chevron-right"></i>
                <i id="left-icon" class="fas fa-chevron-left hidden"></i>
            </button>
            <!-- Tombol Like -->
            <button onclick="like();" title="Like" id="button-like" class="<?=$liked?> hover:text-blue-500 focus:scale-105 transition-all duration-300 focus:text-blue-500 px-4 py-2 rounded outline-none">
                <i class="fas fa-thumbs-up"></i> <br> <span id="likes"><?=$like?></span>
            </button>

            <!-- Tombol Comment -->
            <button title="Comment" class="text-gray-800 hover:text-blue-500 focus:scale-105 transition-all duration-300 focus:text-blue-500 px-4 py-2 rounded outline-none">
                <i class="fas fa-comment"></i> <br> <span><?=$comment?></span>
            </button>

            <!-- Tombol View -->
            <button title="View" class="text-gray-800 hover:text-blue-500 focus:scale-105 transition-all duration-300 focus:text-blue-500 px-4 py-2 rounded outline-none">
                <i class="fas fa-eye"></i> <br> <?=$view?>
            </button>

        </div>
   </div>
</div>
<input type="text" value="0" id="indicator-additional-menu" class="hidden">

<script>

    function like(){
        var kode = $("#no_pbl").val();
        var liked = $("#liked").val();
        $.ajax({
            url: "<?php echo base_url('Vidio/likes'); ?>",
            type: "POST",
            dataType: 'json',
            data: {
                artikel: kode
            },
            success: function(response) {
                $("#likes").empty();
                $("#likes").append(response.like);
                $("#button-like").css('color',response.liked);
            }   
        });
    }

    function additionalMenu(){
    //    alert("Hello");
    var indicator = $("#indicator-additional-menu").val();
        if(indicator == 0){
            $("#main-nav").css('width','21vh');
            $("#left-icon").css('display','block');
            $("#right-icon").css('display','none');
            $("#indicator-additional-menu").val(1);
        }else{
            $("#main-nav").css('width','');
            $("#left-icon").css('display','none');
            $("#right-icon").css('display','block');
            $("#indicator-additional-menu").val(0);
        }
    }
</script>