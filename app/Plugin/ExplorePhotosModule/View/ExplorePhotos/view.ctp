<?= $this->Html->css('view') ?>
<?php if(!empty($photoDetail)): ?>
    <?php
    //$referrer: URL that links to search results page
    if(isset($referrer)){
        echo $this->Html->link('Back to Search Results', $referrer, array('class' => 'back-button'));
    }
    ?>
    <div class="image-container">
        <?php

        $parse = new SimpleXMLElement($photoDetail);
        //pr($parse);die();
        $photo = $parse->photo;
        $server_id = $photo['server'];
        $photo_id = $photo['id'];
        $secret = $photo['secret'];
        $farm = $photo['farm'];
        $owner = $parse->photo->owner['realname'];
        $title = $parse->photo->title;
        $taken = $parse->photo->dates['taken'];
        $views = $parse->photo['views'];
        $tags = $parse->photo->tags->tag;

        $imageUrl = "http://farm".$farm.".static.flickr.com/".$server_id."/".$photo_id."_".$secret."_b.jpg";

        echo $this->Html->tag('h1', $title, array('class' => 'title'));
        $image = $this->Html->image($imageUrl, array('alt' => $photo['title'], 'class' => 'full_photo'));
        echo $this->Html->tag('div', $image, array('class' => 'image'));
        echo $this->Html->tag('div', 'Uploaded By - ' . $owner, array('class' => 'owner'));
        echo $this->Html->tag('div', 'Taken On -' . $taken, array('class' => 'taken'));
        echo $this->Html->tag('div', 'Views - ' . $views, array('class' => 'views'));
        ?>
    </div>
    <h2 class="related-tags">Tags</h2>
    <?php echo "<div class='tags-container'>"; ?>
    <?php foreach($tags as $tag): ?>
        <?= $this->Html->link($tag, array('plugin' => 'explore_photos_module', 'controller' => 'explorePhotos', 'action' => 'explore', 'photoTag' => $tag), array('class' => 'tag')) ?>
    <?php endforeach; ?>
    <?php echo "</div>"; ?>
<?php endif; ?>