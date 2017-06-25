<?php
$gallerysub = page('gallerysub')->children()->visible();
//create collection of all child pages
    $childpages = new Collection();
    foreach ($gallerysub as $project) {
        foreach ($project->images() as $i) {
            $childpages->data[] = $i;
        }
    }

// print_r($childpages);


$childpage = '1';
$childname = '0';

foreach($childpages as $child):
 //   $childtitle = $child->page()->title();
  if ($child->page()->title() != $childpage) {
    echo '<!-- NAME:'.$child->page()->title().' is not PAGE:'.$childpage.' -->'; //TESTING
    $childpage = $child->page()->title();
    echo '<!-- PAGE '.$childpage.' -->'; //TESTING
    echo '<!-- NAME '.$childname.' - '.$child->name().' -->'; //TESTING
  } else {
    echo '<!-- NAME '.$childname.' - '.$child->name().' -->'; //TESTING
  }

// echo '<!-- CHILD NAME '.$childname.' -->'; //TESTING
endforeach;




// fetch the basic set of pages
$childsec = '';
$screenshots = page('gallerysub')->children();
//create collection of all images first
    $images = new Collection();
    foreach ($screenshots as $project) {
        foreach ($project->images() as $i) {
            $images->data[] = $i;
        }
    }
//print_r($images); //TESTING


// $gallerysub Children Object
//(
//    [0] gallerysub/galleryitem-Indica
//    [1] gallerysub/galleryitem-Sativa
//    [2] gallerysub/galleryitem-Concentrate
//)
    
snippet('header')
?>
<style type="text/css">
  #main > header {
    background-image: -webkit-linear-gradient(top, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(<?= $page->pagewrapper()->toFile()->url() ?>);
  }
</style>
<link rel="stylesheet" href="assets/css/photoswipe.css">
<link rel="stylesheet" href="assets/css/default-skin/default-skin.css">
    <!-- Page Wrapper -->
      <div id="page-wrapper">

<?php snippet('nav') ?>

        <!-- Main -->
          <article id="main">
            <header>
              <?= $page->intro()->kirbytext() ?>
            </header>
            <section class="wrapper style5">
              <div class="inner">

                <section>

                    <?= $page->abouttxt()->kirbytext() ?>
 
                  <hr />
                </section>

                <section>
                  <div id="gallery" class="box alt">
                    <div class="row uniform 50%">
                    <h4>ORIG Section Header - Indica</h4>

<?php
$gallerysub2 = page('gallerysub')->children()->visible();
$pgcount = page('gallerysub')->children()->count(); //3
$pgarray = pages(array($page, $page->children()));

$ii = 0;
print_r($pgarray);
//create collection of all child pages
//print_r($gallerysub2); //TESTING
// Children Object
//     [0] gallerysub/galleryitem-Indica
//     [1] gallerysub/galleryitem-Sativa
//     [2] gallerysub/galleryitem-Concentrate

while($ii <= $pgcount) {
  $curchild = $gallerysub2; //      $pgarray[$ii]
  echo '<h4>'.$page->children()->nth(1)->title().'</h4>';
    foreach($curchild->images()->sortBy('sort', 'asc') as $image):
      $childpagetitle = $childpage->page()->title();  //Field Object $childpagetitle 
echo '<!-- title:'.$image->page()->title()->html().' -->'; //TESTING

        //<h4>1 Indica</h4>

      echo '<div class="4u"><span class="image fit"><img src="'.$image->url().'" alt="'.$image->caption().'" /></span><p>'.$image->caption().'</p></div>';
    endforeach;
  $ii++;
} 




// print_r($image); //TESTING
?>

                    <hr />

                    </div>
                    <hr />
                  </div>
                </section>

              </div>
            </section>
          </article>

<?php snippet('footer') ?>