<?= $this->Html->css('view') ?>
<?php if(!empty($photoDetail)): ?>
    <div class="image-container">
        <?php
        $parse = new SimpleXMLElement($photoDetail);
        //    pr($parse);die();
        $photo = $parse->photo;
        //    pr($photo);die();
        $server_id = $photo['server'];
        $photo_id = $photo['id'];
        $secret = $photo['secret'];
        $farm = $photo['farm'];
        $owner = $parse->photo->owner['realname'];
        $title = $parse->photo->title;
        $taken = $parse->photo->dates['taken'];
        $views = $parse->photo['views'];
        $imageUrl = "http://farm".$farm.".static.flickr.com/".$server_id."/".$photo_id."_".$secret."_b.jpg";

        echo $this->Html->tag('h1', $title, array('class' => 'title'));
        $image = $this->Html->image($imageUrl, array('alt' => $photo['title'], 'class' => 'full_photo'));
        echo $this->Html->tag('div', $image, array('class' => 'image'));
        echo $this->Html->tag('div', 'Uploaded By - ' . $owner, array('class' => 'owner'));
        echo $this->Html->tag('div', 'Taken Date - ' . $taken, array('class' => 'owner'));
        echo $this->Html->tag('div', 'Views - ' . $views, array('class' => 'owner'));
        ?>
    </div>
<?php endif; ?>