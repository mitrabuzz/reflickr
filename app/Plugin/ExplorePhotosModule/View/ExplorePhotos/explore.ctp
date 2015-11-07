<div>
    <?= $this->Form->create('ExplorePhotos', array('action' => 'explore')) ?>
    <?= $this->Form->input('photoTag', array('placeholder' => 'Enter tag to search photo', 'label' => false))?>
    <?= $this->Form->end() ?>

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
        ?>
    <?php endif; ?>
</div>