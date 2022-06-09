<?php

/**
 * 
 */
App::uses('AppController', 'Controller');

class FrontendsController extends AppController {

    var $layout = 'public';

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('index', 'livetv', 'sports', 'cricket', 'others', 'football', 'tennis', 'other_sports', 'video', 'photo', 'education', 'health', 'bangladesh', 'politics', 'society', 'law', 'more_news', 'world', 'entertainment', 'tv', 'film', 'music', 'more_e', 'science_tech', 'science', 'technology', 'life', 'fashion', 'food', 'travel', 'auto', 'relation', 'life_ok', 'business', 'economy', 'industry', 'service', 'markets', 'comments', 'opinion', 'interview', 'issues', 'com_more', 'business_more', 'business_technology', 'more', 'america', 'europe', 'asia', 'africa', 'asia_pacific', 'mid_east', 'central_asia', 'issuse');
        //$this->Auth->allow('*');
        $this->loadMenu();
    }

    public function new_booking() {
        $this->loadModel('Seat');
        $this->loadModel('Customer');
        $options['conditions'] = array(
            'Seat.status' => 'ordered'
        );
        $options['joins'] = array(
            array('table' => 'customers',
                'alias' => 'customers',
                'type' => 'LEFT',
                'conditions' => array(
                    'customers.id = Seat.customer_id',
                // 'Package.id' = 5
                )
            )
        );
        $options['fields'] = array('customers.*', 'Seat.*');
        $seats = $this->Seat->find('all', $options);
        $filteredData = array();
        $filteredDatae = array();
        $index = 0;
        foreach ($seats as $key => $seat) {
            $email = "'" . $seat['customers']['email'] . "'";
            if (!empty($seat['Seat']['real'])) {
                if (isset($filteredData[$email])) {

                    $filteredData[$email] .=',' . $seat['Seat']['real'];
                    $filteredDatae[$email] .=',' . $seat['Seat']['id'];
                } else {
                    $filteredData[$email] = $seat['Seat']['real'];
                    $filteredDatae[$email] = $seat['Seat']['id'];
                    $index++;
                }
            }
        }
        //echo 'index:'.$index;
        // pr($seats); 
        // pr($filteredDatae);
        // exit;

        $this->set(compact('seats', 'filteredData', 'filteredDatae'));
    }

    public function loadMenu() {
        $this->loadModel('Menu');
        $this->loadModel('SubMenu');
        $options['joins'] = array(
            array('table' => 'sub_menus',
                'alias' => 'sub_menus',
                'type' => 'LEFT',
                'conditions' => array(
                    'sub_menus.menu_id = Menu.id'
                )
            )
        );
        $options['fields'] = array('sub_menus.name', 'sub_menus.action', 'Menu.name', 'Menu.action');
        $menus = $this->Menu->find('all', $options);
        $filteredMenu = array();
        $unique = array();
        $index = 0;
        foreach ($menus as $key => $menu) {
            $pm = $menu['Menu']['name'];

            if (isset($unique[$pm])) {
                //  echo 'already exist'.$key.'<br/>';
                if (!empty($menu['sub_menus']['name'])) {
                    $temp = array('name' => $menu['sub_menus']['name'], 'action' => $menu['sub_menus']['action']);
                    $filteredMenu[$index]['sub_menu'][] = $temp;
                }
            } else {
                if ($key != 0)
                    $index++;
                $unique[$pm] = 'set';
                $temp = array('name' => $pm, 'action' => $menu['Menu']['action']);
                $filteredMenu[$index]['menu'] = $temp;
                if (!empty($menu['sub_menus']['name'])) {
                    $temp = array('name' => $menu['sub_menus']['name'], 'action' => $menu['sub_menus']['action']);
                    $filteredMenu[$index]['sub_menu'][] = $temp;
                }
            }
        }
        $this->set(compact('filteredMenu'));
    }

    function index() {
        $this->loadModel('Category');
        $this->loadModel('News');
        $this->loadModel('Homesetting');
        /* latest news */
        // todo: pagination 
        $latest_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.name = "politics" and news.status != "unpublished" order by id desc LIMIT 0 , 5';
        $latest_sql = $this->News->query($latest_sql);
        
        $sql = 'SELECT hs.id,n.image_url,n.title,details FROM `homesettings` hs inner join news n on n.id = hs.news_id where hs.section_id = 1 and hs.priority=1';
        $main_news = $this->Homesetting->query($sql);
        
        $this->set(compact('main_news','latest_sql'));
    }

    function asia() {
        
    }

    function detail() {
        
    }

    function bangladesh_more() {
        
    }

    function order() {
        
    }

    function livetv() {
        
    }

    function video() {

        $this->loadModel('Category');
        $this->loadModel('News');
        $this->loadModel('MainVideo');
        $this->loadModel('Videogallery');
        /* Category wise data view start */

        $options['joins'] = array(
            array('table' => 'news',
                'alias' => 'news',
                'type' => 'LEFT',
                'conditions' => array(
                    'News.category_id = Category.id'
                )
            )
        );
        $options['fields'] = array('news.image_url', 'news.title', 'Category.id', 'Category.name');
        $category = $this->Category->find('all', $options);
        $filteredCategory = array();
        $unique = array();
        $index = 0;
        foreach ($category as $key => $category) {

            $pm = $category['Category']['name'];

            if (isset($unique[$pm])) {
                //  echo 'already exist'.$key.'<br/>';
                if (!empty($category['news']['image_url'])) {
                    $temp = array('img' => $category['news']['image_url'], 'title' => $category['news']['title']);
                    $filteredCategory[$index]['news'][] = $temp;
                }
            } else {
                if ($key != 0)
                    $index++;
                $unique[$pm] = 'set';

                $temp = array('name' => $category['Category']['name']);
                $filteredCategory[$index]['category'] = $temp;
                if (!empty($category['news']['image_url'])) {
                    $temp = array('img' => $category['news']['image_url'], 'title' => $category['news']['title']);
                    $filteredCategory[$index]['news'][] = $temp;
                }
            }
        }

//        pr($filteredCategory); exit;
        $options['joins'] = array(
            array('table' => 'categories',
                'type' => 'LEFT',
                'conditions' => array(
                    'Videogallery.category_id = categories.id'
                )
            )
        );


        $sql = 'SELECT mv.id, mv.news_id, n.image_url, n.title, n.details FROM  `mainvideos` mv INNER JOIN news n ON mv.news_id = n.id ORDER BY mv.id DESC LIMIT 0 , 2';
        $main_video = $this->News->query($sql);


        $sql = 'SELECT m3v.id, m3v.news_id, n.image_url, n.title, n.details FROM main3videos m3v INNER JOIN news n ON m3v.news_id = n.id ORDER BY m3v.id DESC LIMIT 0 , 3';
        $main_3_video = $this->News->query($sql);

        $options['fields'] = array('categories.name');
        $categoryToBeShown = $this->Videogallery->find('list', $options);
        $this->set(compact('main_video', 'main_3_video', 'filteredCategory', 'categoryToBeShown'));
    }

    function photo() {

        $this->loadModel('Category');
        $this->loadModel('News');
        $this->loadModel('Photogallery');
        $this->loadModel('MainPhoto');
        /* more news */
//        $bangladesh_sql = 'SELECT c.id, n.image_url, n.title, c.name FROM categories c inner JOIN news n  ON c.id = n.category_id WHERE n.status != "unpublished" order by n.id desc';
//        $bangladesh_news = $this->News->query($bangladesh_sql);
        // main body news
//        $this->set(compact( 'bangladesh_news'));


        $options['joins'] = array(
            array('table' => 'news',
                'alias' => 'news',
                'type' => 'LEFT',
                'conditions' => array(
                    'News.category_id = Category.id'
                )
            )
        );
        $options['fields'] = array('news.image_url', 'news.title', 'Category.id', 'Category.name');
        $category = $this->Category->find('all', $options);
        $filteredCategory = array();
        $unique = array();
        $index = 0;
        foreach ($category as $key => $category) {

            $pm = $category['Category']['name'];

            if (isset($unique[$pm])) {
                //  echo 'already exist'.$key.'<br/>';
                if (!empty($category['news']['image_url'])) {
                    $temp = array('img' => $category['news']['image_url'], 'title' => $category['news']['title']);
                    $filteredCategory[$index]['news'][] = $temp;
                }
            } else {
                if ($key != 0)
                    $index++;
                $unique[$pm] = 'set';

                $temp = array('name' => $category['Category']['name']);
                $filteredCategory[$index]['category'] = $temp;
                if (!empty($category['news']['image_url'])) {
                    $temp = array('img' => $category['news']['image_url'], 'title' => $category['news']['title']);
                    $filteredCategory[$index]['news'][] = $temp;
                }
            }
        }

//        pr($filteredCategory); exit;
        $options['joins'] = array(
            array('table' => 'categories',
                'type' => 'LEFT',
                'conditions' => array(
                    'Photogallery.category_id = categories.id'
                )
            )
        );
        $sql = 'SELECT mp.id, mp.news_id,n.image_url, n.title, n.details FROM `mainphotos` mp inner join news n on mp.news_id = n.id order by mp.id desc limit 0,1';
        $main_photo = $this->News->query($sql);

        $sql = 'SELECT m2p.id, m2p.news_id, n.image_url, n.title, n.details FROM  `main2photos` m2p INNER JOIN news n ON m2p.news_id = n.id ORDER BY m2p.id DESC LIMIT 0 , 2';
        $main_2_photo = $this->News->query($sql);

        $sql = 'SELECT m3p.id, m3p.news_id, n.image_url, n.title, n.details FROM main3photos m3p INNER JOIN news n ON m3p.news_id = n.id ORDER BY m3p.id DESC LIMIT 0 , 3';
        $main_3_photo = $this->News->query($sql);

        $options['fields'] = array('categories.name');
        $categoryToBeShown = $this->Photogallery->find('list', $options);
        $this->set(compact('filteredCategory', 'categoryToBeShown', 'main_photo', 'main_2_photo', 'main_3_photo'));
    }

    function education() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 37 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 37 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 37 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 37 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);
        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function health() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 38 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 38 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 38 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 38 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);
        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function bangladesh() {
        
    }

    function politics() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` =1 and news.status != "unpublished" and priority = 3';
        $priority_three_politics_news = $this->News->query($sql);

        /* more news */
        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.name = "politics" and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` =1 and news.status != "unpublished" and priority = 2';
        $priority_two_politics_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` =1  and news.status != "unpublished" and priority = 1';
        $priority_one_politics_news = $this->News->query($first_sql);
        $this->set(compact('priority_three_politics_news', 'more_news', 'priority_two_politics_news', 'priority_one_politics_news'));
    }

    function society() {

        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` =2 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.name = "politics" and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` =2 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` =2 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);
        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function law() {

        $this->loadModel('Category');
        $this->loadModel('News');
        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` =3 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.name ="Law" and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` =3 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` =3 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);
        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function more_news() {
        
    }

    function world() {
        
    }

    function america() {
        
    }

    function europe() {
        
    }

    function africa() {
        
    }

    function central_asia() {
        
    }

    function mid_east() {
        
    }

    function asia_pacific() {
        
    }

    function sports() {
        
    }

    function cricket() {

        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 11 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 11 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 11 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 11 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);



        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function football() {

        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 12 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 12 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 12 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 12 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);

        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function tennis() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 13 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 13 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 13 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 13 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);






        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function other_sports() {
        
    }

    function entertainment() {
        
    }

    function tv() {


        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 15 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 15 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 15 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 15 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);






        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function film() {

        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 16 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 16 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 16 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 16 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);

        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function music() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 17 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 17 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 17 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 17 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);

        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function more_e() {
        
    }

    function science_tech() {
        
    }

    function science() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 18 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 18 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 18 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 18 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);

        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function technology() {

        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 19 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 19 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 19 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 19 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);






        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function life() {
        
    }

    function fashion() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 20 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 20 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 20 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 20 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);






        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function others() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 25 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 25 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 25 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 25 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);



        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function food() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 25 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 21 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 21 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 21 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);






        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function relation() {

        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 22 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 22 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 22 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 22 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);






        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function auto() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 23 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 23 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 23 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 23 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);



        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function travel() {

        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 24 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);


        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 24 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 24 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);



        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 24 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);






        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function life_ok() {
        
    }

    function business() {
        
    }

    function business_more() {
        
    }

    function business_technology() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 29 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 29 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 29 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 29 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);

        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function economy() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 26 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 26 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 26 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 26 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);

        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function industry() {

        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 27 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 27 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 27 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 27 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);






        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function service() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 30 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 30 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 30 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 30 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);






        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function markets() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 28 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 28 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 28 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 28 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);






        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function comments() {
        
    }

    function opinion() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 31 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
//        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 31 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 31 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 31 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);






        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function interview() {

        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 32 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 32 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 32 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 32 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);
        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function issuse() {
        $this->loadModel('Category');
        $this->loadModel('News');

        /* last news */ // todo: add a table name homepage_news and relate it to news table  
        $sql = 'SELECT title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 33 and news.status != "unpublished" and priority = 3';
        $priority_three_news = $this->News->query($sql);

        /* more news */
        // todo: pagination 
        $more_sql = 'SELECT news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id = 33 and news.status != "unpublished" order by id desc LIMIT 0 , 9';
        $more_news = $this->News->query($more_sql);

        // main body news

        $main_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 33 and news.status != "unpublished" and priority = 2';
        $priority_two_news = $this->News->query($main_sql);

        $first_sql = 'SELECT news.id, title, details, image_url FROM `breaking_news` inner JOIN categories ON categories.id = breaking_news.category_id inner JOIN news ON news.id = breaking_news.news_id WHERE breaking_news.`category_id` = 33 and news.status != "unpublished" and priority = 1';
        $priority_one_news = $this->News->query($first_sql);
        $this->set(compact('priority_three_news', 'more_news', 'priority_two_news', 'priority_one_news'));
    }

    function com_more() {
        
    }

}

?>