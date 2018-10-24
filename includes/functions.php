<?php

function make_menu_link($link, $childs=[], $access=LINK_ALL){
    return [
        'link'=>$link,
        'childs' => $childs,
        'access'=>$access
    ];
}

function render_menu_links($links, $level=0)
{
    global $page, $is_login, $is_admin;
    ob_start();
    if($level==0){
?>
<ul class="navbar-nav ml-auto main-nav ">
    <?php foreach($links as $title=>$prop):
                  $link = $prop['link'];
                  $childs = $prop['childs'];
                  $access = $prop['access'];

                  if($access == LINK_LOGIN_ONLY && $is_login == false)
                  {
                      continue;
                  }

                  if($access == LINK_ADMIN_ONLY && $is_admin == false)
                  {
                      continue;
                  }

                  $li_class = '';
                  if("/$page" == $link)
                  {
                      $li_class = 'active';
                  }
                  $href = BASE_URL.'?page='.substr($link, 1);

                  if($link[0] == '#')
                  {
                      $href = $link;
                  }


                  $childs_rendered = "";

                  $drop_down = false;

                  if($childs)
                  {
                      $nested_childs = render_menu_links($childs, $level+1);
                      $childs_rendered = $nested_childs['links'];
                      if($nested_childs['contains_active'])
                      {
                          $li_class = 'active';
                      }
                      $drop_down = true;
                  }


    ?>
    <?php if($drop_down == false): ?>
    <li class="nav-item <?= $li_class; ?>">
        <a class="nav-link" href="<?= $href; ?>"><?= $title; ?></a>
    </li>
    <?php else: ?>
    <li class="nav-item <?= $li_class; ?> dropdown dropdown-slide">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $title; ?> <span><i class="fa fa-angle-down"></i></span>
        </a>
        <!-- Dropdown list -->
        <?php echo $childs_rendered ?>

    </li>
    <?php endif; ?>

    <?php endforeach;?>
</ul>
<?php 

                 }else
    {

        //if nested links contains active so it will return true
        //else false so parent link will get active class
        $contains_active = false;
?>
<div class="dropdown-menu dropdown-menu-right">
    <?php foreach($links as $title=>$prop): 
        $link = $prop['link'];
        $childs = $prop['childs'];
        $access = $prop['access'];

        if($access == LINK_LOGIN_ONLY && $is_login == false)
        {
            continue;
        }

        if($access == LINK_ADMIN_ONLY && $is_admin == false)
        {
            continue;
        }

        $li_class = '';
        if("/$page" == $link)
        {
            $li_class = 'active';
            $contains_active = true;
        }
        $href = BASE_URL.'?page='.substr($link, 1);

        if($link[0] == '#')
        {
            $href = $link;
        }

    ?>
    <a class="dropdown-item <?php echo $li_class ?>" href="<?= $href; ?>"><?= $title; ?></a>
    <?php endforeach; ?>
</div>
<?php

        return ['links'=>ob_get_clean(), 'contains_active'=>$contains_active];

    }
    return ob_get_clean();
}

function user_have_page_access($page)
{
    global $links,$is_admin, $is_login;
    //first make links linear array

    $linear_links = links_to_linear_array( $links );

    if(isset($linear_links["/$page"]))
    {
        $link = $linear_links["/$page"];
        $access = $link['access'];
        
        if($access == LINK_LOGIN_ONLY && $is_login==false)
        {
            return false;
        }
        
        if($access == LINK_ADMIN_ONLY && $is_admin==false)
        {
            return false;
        }
        
        
    }


        return true;
}

function links_to_linear_array($links)
{
    $result = [];

    foreach($links as $title=>$ops)
    {
        $result[$ops['link']] = [
            'title'=>$title,
            'link'=>$ops['link'],
            'access'=>$ops['access']
        ];

        if($ops['childs'])
        {
            $childs_links = links_to_linear_array($ops['childs']);
            $result = array_merge($result, $childs_links);

        }

    }


    return $result;
}

