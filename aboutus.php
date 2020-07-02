<?php
include('inc/header.php');
?>

<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    h2 {
        overflow: hidden;
    }

    img {
        height: 100% !important;
    }

    .loader {
        width: 100%;
        height: 100%;
        background-color: #fff;
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999999;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
    }

    .loader img {
        width: 90px !important;
        height: 90px !important;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .loader.hidden {
        animation: fadeouts 2s;
        animation-fill-mode: forwards;
    }

    @keyframes fadeouts {
        100% {
            opacity: 0;
            visibility: hidden;
        }
    }
</style>

<div class="container">
    <div class="my-4 bg-white row justify-content-center align-content-center p-4" style=" border-radius: 10px; ">
        <!-- read more -->
        <div class="col-12 col-md-6 py-3">
            <div class="p-5">
                <h2 class="text-primary"> ABOUT US </h2>
                <p class="text-dark">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages
                </p>

                <div class="">
                    <button class="btn btn-primary font text-white">
                        Read More
                    </button>
                </div>

            </div>
        </div>
        <!-- /read more -->

        <!-- image -->
        <div class="col-12 col-md-6">
            <img src="images/about/undraw_teaching.svg" class="w-100 h-100" alt="">
        </div>
        <!-- /image -->


    </div>
</div>

<?php include('inc/footer.php'); ?>