<?php

$pagesMarkup = '';

for ($i = 0; $i < 20; $i++) {
    $classes = array();
    if ($i % 2 !== 0) {
        // Odd
        $classes[] = 'odd';
    }
    if ($i < 10) {
        $classes[] = 'flat';
    }
    if ($i == 10) {
        $classes[] = 'first';
        $pagesMarkup = <<<HTML
<div class="flatPageContainer">
    {$pagesMarkup}
</div>
HTML;
    }
    $classes = implode(' ', $classes);

    $pagesMarkup .= <<<HTML
    <div class="fold {$classes}">
        <div class="page">
        </div>
    </div>
HTML;
}

$markup = <<<HTML
<div class="row">
<div class="span-two-thirds">
<div class="fold-container">
    {$pagesMarkup}
    <div class="fold active">
        <div class="page">
        </div>
    </div>
</div>
</div>
</div>
HTML;

$css = <<<CSS
<style>
section {
    margin-top: 60px;
}
.fold-container {
    width: 100%;
    height: 200px;
    position: relative;
    -webkit-perspective: 2500;
}

.fold {
    float: left;
    height: 200px;
    width: 200px;
    -webkit-transform-style: preserve-3d;
    -webkit-transform: translateZ( -100px );
    margin-left: -165px;
}

.fold.flat {
    margin-right:-194px;
    margin-left: 0;
}
.fold.flat .page {
    -webkit-transform: rotateY( 90deg ) translateZ( -97px ) ;
}
.flatPageContainer {
    margin-right: 88px;
    width: 60px;
    float: left;
}
.fold.active {
    -webkit-transform: translateZ( 0px );
    margin-left: -82px;
}

.page {
    display: block;

    height: 200px;
    width: 200px;

    background-color: #333333;
    outline: 1px solid #CCC;

    -webkit-transform: rotateY( 80deg );
}
.odd .page {
    -webkit-transform: rotateY( -80deg );
}
.active .page {
    -webkit-transform: rotateY( 0deg );
}

</style>
CSS;

print <<<HTML
<html>
<head>
    {$css}
    <link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.3.0/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <section>
            <h1>Concertina</h1>
            {$markup}
        </section>
    </div>
</body>
</html>
HTML;

?>
