<?= $this->Html->css('explore') ?>
<div>
    <?= $this->Form->create('ExplorePhotos', array('action' => 'explore', 'type' => 'get')) ?>
    <?= $this->Form->input('photoTag', array('placeholder' => 'Enter tag to search photo', 'label' => false, 'value' => (isset($photoTag) ? $photoTag : '')))?>
    <?= $this->Form->end('Search') ?>

    <?php if(!empty($results)): ?>
        <?php
            $parse = new SimpleXMLElement($results);
            foreach($parse->photos->photo as $photo) {
                $server_id = $photo['server'];
                $photo_id = $photo['id'];
                $secret = $photo['secret'];
                $farm = $photo['farm'];
                $url = "http://farm".$farm.".static.flickr.com/".$server_id."/".$photo_id."_".$secret."_q.jpg";
                $image = $this->Html->image($url, array('alt' => $photo['title']));
                echo $this->Html->link($image, array('controller' => 'explorePhotos', 'action' => 'view', 'id' => $photo_id), array('escape' => false));
            }

            echo "<div class='nav-buttons-container'>";
            $currentPage = $page;

            //Displays 'Previous Page' link all pages other than first page.
            if($currentPage != 1){
                echo $this->Html->link('Previous Page', array('controller' => 'explorePhotos', 'action' => 'explore', 'photoTag' => $photoTag, 'page' => $currentPage - 1));
            }

            //Displays 'Next Page' link only if there are more pages.
            if($currentPage < $parse->photos['pages']){
                echo $this->Html->link('Next Page', array('controller' => 'explorePhotos', 'action' => 'explore', 'photoTag' => $photoTag, 'page' => $currentPage + 1));
            }
            echo "</div>";
        ?>
    <?php endif; ?>
</div>