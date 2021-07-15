<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>IR Project</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet"/>
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container px-lg-4">
        <a class="navbar-brand font-farsi" href="#page-top">جستجوی مشاغل کوئرا مگنت</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
    </div>
</nav>
<!-- Header-->
<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <form action="{{ route('search') }}" method="get">
            <div class="row justify-content-center">
                <div class="form-group col-12">
                    <label for="query"></label>
                    <input id="query" name="query" type="text" class="form-control font-farsi"
                           placeholder="عبارت مد نظر خود را وارد کنید" style="text-align: right">
                </div>
                <div class="form-group col-12" style="margin-top: 10px">
                    <label for="submit"></label>
                    <input id="submit" name="submit" value="Search" type="submit" class="btn-group-lg font-farsi"
                           style="text-align: right">
                </div>
            </div>
        </form>
    </div>
</header>
<!-- results section-->
<section id="about">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <ul class="list-group">
{{--                    @if(isset($results))--}}
{{--                        @foreach($results as $result)--}}
                            <li class="list-group-item">
                                <a href="" style="float: right; display: inline-block; margin-left: 5pt;">استخدام پایتون کار </a>
                                <p class="result" style="float: right; display: inline-block; margin-left: 5pt;">فراگستران </p>
                                <p class="result" style="float: right; display: inline-block; margin-left: 5pt;">تمام وقت </p>
                                <p class="result" style="float: right; display: inline-block; margin-left: 5pt;">سنیور </p>
                                <p class="result" style="float: right; display: inline-block; margin-left: 5pt;">سنیور </p>
                                <p class="result" style="float: right; display: inline-block; margin-left: 5pt;">وظیفه ی ئایتون کار این است که پایتون بنویسد و لا غیر </p>
                            </li>
{{--                        @endforeach--}}
{{--                    @endif--}}
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Abolfazl Nasrabadi</p></div>
</footer>
<script>
    function search() {

    }
</script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../js/scripts.js"></script>
</body>
</html>
