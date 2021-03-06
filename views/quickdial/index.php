<?
$page_title = Studip\Mobile\Helper::out($GLOBALS['UNI_NAME_CLEAN']);
$this->set_layout("layouts/single_page");
?>
<link rel="stylesheet" href="<?= $plugin_path ?>/public/stylesheets/startscreen.css" />

<div class="ui-grid-b">
  <div class="ui-block-a grid">
    <a href="<?= $controller->url_for("activities") ?>" class="externallink" data-ajax="false">
      <img class="icon" src="<?= $plugin_path ?>/public/images/quickdial/news.png" /><br />
      <span>Activity Stream</span>
    </a>
  </div>

  <div class="ui-block-b grid">
    <a href="<?= $controller->url_for("calendar") ?>"  class="externallink" data-ajax="false">
      <img class="icon" src="<?= $plugin_path ?>/public/images/quickdial/schedule.png" /><br />
      <span>Planer</span>
    </a>
  </div>

  <div class="ui-block-c grid">
    <a href="<?= $controller->url_for("mails") ?>/" class="externallink" data-ajax="false">
      <? if ($number_unread_mails > 0) { ?>
      <span class="notification"><?= $number_unread_mails ?></span>
      <? } ?>
      <img class="icon" src="<?= $plugin_path ?>/public/images/quickdial/mail.png" /><br />
      <span>Nachrichten</span>
    </a>
  </div>

  <div class="ui-block-a grid scndrow">
    <a href="<?= $controller->url_for("courses") ?>" class="externallink" rel="external" data-ajax="false">
      <img class="icon" src="<?= $plugin_path ?>/public/images/quickdial/seminar.png" /><br />
      <span>Veranstaltungen</span>
    </a>
  </div>

  <div class="ui-block-c grid scndrow">
    <a href="<?= $controller->url_for("profiles/show",$user_id) ?>"
       class="externallink" rel="external" data-ajax="false">
      <img class="icon" src="<?= $plugin_path ?>/public/images/quickdial/profile.png" /><br />
      <span>Ich</span>
    </a>
  </div>
</div><!-- grid end -->

<div style="width:70%;height:15px;"></div>

<? if (!empty($next_courses)) : ?>

<ul id="nextCourses" data-role="listview" data-inset="true" data-theme="c">

  <li data-role="list-divider" data-theme="b">Als Nächstes</li>

  <? foreach($next_courses as $next) { ?>
  <li>
    <? $this_link = strlen($next["id"]) == 32 ? $controller->url_for("courses/show", $next["id"]) : "" ?>
    <a href="<?= $this_link ?>" data-ajax="false">
      <p>
        <strong><?=\Studip\Mobile\Helper::get_weekday($next["weekday"]) ?></strong>
        <?=Studip\Mobile\Helper::out($next["title"]) ?>
      </p>

      <p>
        <?=Studip\Mobile\Helper::out($next["description"]) ?>
        <span class="ui-li-count">
          <?=Studip\Mobile\Helper::out($next["beginn"])?> - <?=Studip\Mobile\Helper::out($next["ende"])?>
        </span>
      </p>
    </a>
  </li>
  <? } ?>

</ul>
<? endif ?>
