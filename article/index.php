<?php include('header.php'); ?>
<main class="home">
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            TRENDING NOW
                        </div>   
                        <div class="content-right">
                            <marquee behavior="" direction="left" onmouseover="this.stop()" onmouseleave="this.start()">
                                <div class="text-news">
                                    <?php get_trending_title(); ?>
                                </div>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-news">
        <div class="container">
            <div class="row">
            
                <div class="col-8 content-left">
                    <?php get_min_news('Trending');?>
                    <!-- <figure>
                        <a href="news-detail.php">
                            <div class="thumbnail">
                                <img src="https://via.placeholder.com/730x415" alt="">
                                <div class="title">
                                    អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                                </div>
                            </div>
                        </a>
                    </figure> -->
                </div>
                <div class="col-4 content-right">
                    <?php get_min_news('');?>
                    <!-- <div class="col-12">
                        <figure>
                            <a href="">
                                <div class="thumbnail">
                                    <img src="https://via.placeholder.com/350x200" alt="">
                                <div class="title">
                                    អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                                </div>
                                </div>
                            </a>
                        </figure>
                    </div>
                    <div class="col-12">
                        <figure>
                            <a href="">
                                <div class="thumbnail">
                                    <img src="https://via.placeholder.com/350x200" alt="">
                                <div class="title">
                                    អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                                </div>
                                </div>
                            </a>
                        </figure>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            SPORT NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news">
        <div class="container">
            <div class="row">
                <?php get_news('Sport');?>
                <!-- <div class="col-4">
                    <figure>
                        <a href="">
                            <div class="thumbnail">
                                <img src="https://via.placeholder.com/350x200" alt="">
                            <div class="title">
                                អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                            </div>
                            </div>
                        </a>
                    </figure>
                </div> -->
                <!-- <div class="col-4">
                    <figure>
                        <a href="">
                            <div class="thumbnail">
                                <img src="https://via.placeholder.com/350x200" alt="">
                            <div class="title">
                                អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                            </div>
                            </div>
                        </a>
                    </figure>
                </div> -->
                <!-- <div class="col-4">
                    <figure>
                        <a href="">
                            <div class="thumbnail">
                                <img src="https://via.placeholder.com/350x200" alt="">
                            <div class="title">
                                អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                            </div>
                            </div>
                        </a>
                    </figure>
                </div> -->
            </div>
        </div>
    </section>

    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            SOCIAL NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="news">
        <div class="container">
            <div class="row">
            <?php get_news('Social');?>
                <!-- <div class="col-4">
                    <figure>
                        <a href="">
                            <div class="thumbnail">
                                <img src="https://via.placeholder.com/350x200" alt="">
                            <div class="title">
                                អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                            </div>
                            </div>
                        </a>
                    </figure>
                </div>
                <div class="col-4">
                    <figure>
                        <a href="">
                            <div class="thumbnail">
                                <img src="https://via.placeholder.com/350x200" alt="">
                            <div class="title">
                                អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                            </div>
                            </div>
                        </a>
                    </figure>
                </div>
                <div class="col-4">
                    <figure>
                        <a href="">
                            <div class="thumbnail">
                                <img src="https://via.placeholder.com/350x200" alt="">
                            <div class="title">
                                អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                            </div>
                            </div>
                        </a>
                    </figure>
                </div> -->
            </div>
        </div>
    </section>
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            ENTERTAINMENT NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="news">
        <div class="container">
            <div class="row">
            <?php get_news('Enterainment');?>
                <!-- <div class="col-4">
                    <figure>
                        <a href="">
                            <div class="thumbnail">
                                <img src="https://via.placeholder.com/350x200" alt="">
                            <div class="title">
                                អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                            </div>
                            </div>
                        </a>
                    </figure>
                </div>
                <div class="col-4">
                    <figure>
                        <a href="">
                            <div class="thumbnail">
                                <img src="https://via.placeholder.com/350x200" alt="">
                            <div class="title">
                                អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                            </div>
                            </div>
                        </a>
                    </figure>
                </div>
                <div class="col-4">
                    <figure>
                        <a href="">
                            <div class="thumbnail">
                                <img src="https://via.placeholder.com/350x200" alt="">
                            <div class="title">
                                អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                            </div>
                            </div>
                        </a>
                    </figure>
                </div> -->
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>