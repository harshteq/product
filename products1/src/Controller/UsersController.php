<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use App\Form\ContactForm;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(["login"]);
        $this->loadModel("Cart");
        $this->loadModel("Products");
        $this->loadModel("ProductCategories");
        $this->loadModel("ProductComments");
        $this->loadModel("UserProfile");
        $this->loadModel("Reaction");



        if($this->Authentication->getIdentity()){
            $user1 = $this->Authentication->getIdentity();
            $auth = true;
        $uid = $user1->id;
        $result1 = $this->Users->get($uid, [
            "contain" => ["UserProfile"],
        ]);
        $this->set(compact("user1","result1"));
        
        }else{
            $result1 = null;
            $user1 = null;
            $auth = false;
            $this->set(compact("user1","result1"));
        
        }

         if($user = $this->Authentication->getIdentity()){

            
            $uid = $user->id;
            
            $cart = $this->Cart->find('all')->contain(['Users', 'Products'])->where(['user_id'=>$uid])->toArray();
           
            
                $this->set(compact('cart'));
            }

    }

    // public function index()
    // {
    //     $users = $this->paginate($this->Users);

    //     $this->set(compact("users"));
    // }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            "contain" => ["UserProfile"],
        ]);

        $this->set(compact("user"));
    }
    public function adminview($id = null)
    {
        $this->viewBuilder()->setLayout('mylayout');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $data = $this->Users->get($uid,['contain'=>['UserProfile']]);
        $user = $this->Users->get($id, [
            "contain" => ["UserProfile"],
        ]);

        $this->set(compact("user",'data'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $result = $this->Authentication->getIdentity();

        if($result==null){

            
            $user = $this->Users->newEmptyEntity();
            if ($this->request->is("post")) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
    
                $image = $this->request->getData("user_profile.profile_image");
    
                $name = $image->getClientFilename();
    
                $path = WWW_ROOT . "img" . DS . $name;
    
                if ($name) {
                    $image->moveTo($path);
                }
    
                $user->user_profile->profile_image = $name;
    
                if ($this->Users->save($user)) {
                    $this->Flash->success(__("The user has been saved."));
    
                    return $this->redirect(["action" => "login"]);
                }
                $this->Flash->error(
                    __("The user could not be saved. Please, try again.")
                );
            }
            $this->set(compact("user"));
        }
        else{
            $this->Flash->success(__("The user has been already regstered."));
    
            return $this->redirect(["action" => "homepage"]);
        }
        

    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('mylayout');

        $user = $this->Users->get($id, [
            "contain" => ["UserProfile"],
        ]);
        $fileName2 = $user->user_profile["profile_image"];

        if ($this->request->is(["patch", "post", "put"])) {
            $data = $this->request->getData();

            $productImage = $this->request->getData(
                "user_profile.change_image"
            );

            $fileName = $productImage->getClientFilename();
            if ($fileName == "") {
                $fileName = $fileName2;
            }

            $user->user_profile["profile_image"] = $fileName;

            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__("The user has been saved."));

                return $this->redirect(["action" => "view", $user->id]);
            }
            $this->Flash->error(
                __("The user could not be saved. Please, try again.")
            );
        }
        $this->set(compact("user"));
    }
    public function adminedit($id = null)
    {
        $this->viewBuilder()->setLayout('mylayout');

        $result = $this->Authentication->getIdentity();

        $uid = $result->id;
        $data = $this->Users->get($uid, [
            "contain" => ["UserProfile"]
        ]);
        

        $user = $this->Users->get($id, [
            "contain" => ["UserProfile"],
        ]);
        $fileName2 = $user->user_profile["profile_image"];

        if ($this->request->is(["patch", "post", "put"])) {
            $data = $this->request->getData();

            $productImage = $this->request->getData(
                "user_profile.change_image"
            );

            $fileName = $productImage->getClientFilename();
            if ($fileName == "") {
                $fileName = $fileName2;
            }

            $user->user_profile["profile_image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__("profile has been edited."));

                return $this->redirect(["action" => "adminview", $user->id]);
            }
            $this->Flash->error(
                __("The admin could not be saved. Please, try again.")
            );
        }
        $this->set(compact("user",'data'));
    }
    public function admin ($id = null)
    {
        $user = $this->Users->get($id, [
            "contain" => ["UserProfile"],
        ]);
        $fileName2 = $user->user_profile["profile_image"];

        if ($this->request->is(["patch", "post", "put"])) {
            $data = $this->request->getData();

            $productImage = $this->request->getData(
                "user_profile.change_image"
            );

            $fileName = $productImage->getClientFilename();
            if ($fileName == "") {
                $fileName = $fileName2;
            }

            $user->user_profile["profile_image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__("The admin has been saved."));

                return $this->redirect(["action" => "adminview", $user->id]);
            }
            $this->Flash->error(
                __("The admin could not be saved. Please, try again.")
            );
        }
        $this->set(compact("user"));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(["post", "delete"]);
        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {
            $this->Flash->success(__("The user has been deleted."));
        } else {
            $this->Flash->error(
                __("The user could not be deleted. Please, try again.")
            );
        }

        return $this->redirect(["action" => "userlist"]);
    }

    public function login()
    {
        $this->request->allowMethod(["get", "post"]);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $result = $this->Authentication->getIdentity();

            if ($result["status"] == 0) {
                $redirect = $this->request->getQuery("redirect", [
                    "controller" => "Users",
                    "action" => "logout",
                ]);
                $this->Flash->error(
                    __("The  user status is inactive please try agin later")
                );
                return $this->redirect($redirect);
            } else {
                if ($result->user_type == 1) {
                    $redirect = $this->request->getQuery("redirect", [
                        "controller" => "Users",
                        "action" => "adminpanel",
                    ]);
                    $this->Flash->success(
                        __("admin logged in successfully")
                    );
                    return $this->redirect($redirect);
                } elseif ($result->user_type == 0) {

                    $redirect = $this->request->getQuery("redirect", [
                        "controller" => "Users",
                        "action" => "homepage",
                    ]);
                    $this->Flash->success(
                        __("you are logged in successfully")
                    );
                    return $this->redirect($redirect);
                }
            }

            return $this->redirect([
                "controller" => "Users",
                "action" => "homepage",
            ]);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is("post") && !$result->isValid()) {
            $this->Flash->error(__("Invalid email or password"));
        }
    }
    // in src/Controller/UsersController.php
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect([
                "controller" => "Users",
                "action" => "homepage",
            ]);
        }
    }

    public function userstatus($id = null, $status = null)
    {
        $this->request->allowMethod(["post"]);

        $user = $this->Users->get($id);

        if ($status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }

        if ($this->Users->save($user)) {
            $this->Flash->success(__("The status has been deleted."));
        } else {
            $this->Flash->error(
                __("The status could not be deleted. Please, try again.")
            );
        }

        return $this->redirect(["action" => "userlist"]);
    }

    public function productstatus($id = null, $status = null)
    {
        $this->request->allowMethod(["post"]);

        $product = $this->Products->get($id);

        if ($status == 1) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }

        if ($this->Products->save($product)) {
            $this->Flash->success(__("The status has been deleted."));
        } else {
            $this->Flash->error(
                __("The status could not be deleted. Please, try again.")
            );
        }

        return $this->redirect(["action" => "adminpanel"]);
    }
    public function adminpanel()
    {
        
        $status=$this->request->getQuery('status');
        // dd($status);
        if($status == null){
            $products=$this->Products->find('all');
        }else{
            $products=$this->Products->find('all')->where(['status'=>$status]);
        }
        
        $this->set(compact('products'));
        if($this->request->is('ajax')){
            // start code will work in case of json return from here
        //     echo json_encode($users);
        //    die;
           // end code will work in case of json return from here

            // start code will work in case of element rander from here
           $this->autoRender = false;
           
           $this->render('/element/flash/user_index');
         // end code will work in case of element rander from here
        }
        $this->viewBuilder()->setLayout("mylayout");
        $result = $this->Authentication->getIdentity();

        $uid = $result->id;
        $data = $this->Users->get($uid, [
            "contain" => ["UserProfile"],
        ]);

        if ($result->user_type == 1) {
            $this->paginate= [
                'order' => ['id' => 'DESC']
               ];
               
              
            $products = $this->paginate($this->Products);

            $this->set(compact("products", "data"));
        } else {
            return $this->redirect(["action" => "homepage"]);
        }
    }

    public function productadd()
    {
        $this->viewBuilder()->setLayout("mylayout");
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        if($user->user_type == 0){
            $this->Flash->error(
                __("you can not access the page")
            );
            return $this->redirect(["action" => "homepage"]);
        }else{
                 $data = $this->Users->get($uid,['contain'=>['UserProfile']]);
                $productCategories = $this->paginate($this->ProductCategories);
               
        
                $this->set(compact("productCategories"));
        
                $product = $this->Products->newEmptyEntity();
                if ($this->request->is("post")) {
                    $product = $this->Products->patchEntity(
                        $product,
                        $this->request->getData()
                    );
        
                    $image = $this->request->getData("product_image");
        
                    $name = $image->getClientFilename();
        
                    $path = WWW_ROOT . "img" . DS . $name;
        
                    if ($name) {
                        $image->moveTo($path);
                    }
        
                    $product->product_image = $name;
        
                    if ($this->Products->save($product)) {
                        $this->Flash->success(__("The product has been saved."));
        
                        return $this->redirect(["action" => "adminpanel"]);
                    }
                    $this->Flash->error(
                        __("The product could not be saved. Please, try again.")
                    );
                }
                
                $this->set(compact('data',"product"));
            }
        }

    public function addcategory()
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;

        if($user->user_type == 0){
            $this->Flash->error(
                __("you can not access the page")
            );
            return $this->redirect(["action" => "homepage"]);
        }
        else{

        
        $data = $this->Users->get($uid,['contain'=>['UserProfile']]);

        $this->viewBuilder()->setLayout("mylayout");
        
        $productCategory = $this->ProductCategories->newEmptyEntity();
        if ($this->request->is("post")) {
            $productCategory = $this->ProductCategories->patchEntity(
                $productCategory,
                $this->request->getData()
            );
            if ($this->ProductCategories->save($productCategory)) {
                $this->Flash->success(
                    __("The product category has been saved.")
                );

                return $this->redirect(["action" => "viewcategory"]);
            }
            $this->Flash->error(
                __(
                    "The product category could not be saved. Please, try again."
                )
            );
        }
        $this->set(compact('data',"productCategory"));
    }
}

    public function viewcategory()
    {
        
        $this->viewBuilder()->setLayout("mylayout");
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        if($user->user_type==0){
  $this->Flash->error(
                __("you can not access the page")
            );
            return $this->redirect(["action" => "homepage"]);
        }
        else{

            $data = $this->Users->get($uid,['contain'=>['UserProfile']]);
            
            $productCategories = $this->paginate($this->ProductCategories);
            
            $this->set(compact("productCategories",'data'));
        }
    }
    public function productview($id=null)
    {
      
       
        if($user = $this->Authentication->getIdentity()){

            $uid = $user->id;

            $this->paginate = [
                'contain' => ['Users', 'Products'],
            ];
            // $cart = $this->paginate($this->Cart);
            // $cart = $this->Cart->find('all')->contain(['Users', 'Products'])->where(['user_id'=>$uid]);
            // $this->set(compact('cart'));
            
            $user = $this->Users->get($uid, [
                "contain" => ["UserProfile"],
            ]);
            // dd($user->cart);
            // dd($cart);
        }
   

        $this->set(compact("user"));

        $product = $this->Products->get($id, [
            "contain" => ["ProductComments","Reaction"],
        ]);
        //dd($product);
        $productComment = $this->ProductComments->newEmptyEntity();
        
        if ($this->request->is("post")) {
            if($this->Authentication->getIdentity()){

            }else{
                $this->Flash->error(__("please login  then comment."));
                        return $this->redirect(["action" => "login"]);
            }

           $result = $this->ProductComments->find('all')->where(['product_id'=>$id, 'user_id'=> $uid])->first();
          if($result){
            $productComment = $this->request->getData('comments');
            $result->comments = $productComment;
            if($this->ProductComments->save($result)) {
                $this->Flash->success(
                    __("The product comment has been updated.")
                );

                return $this->redirect([
                    "action" => "productview",
                    $product->id,
                ]);
            }
        }
            $data = $this->request->getData();

            $productComment["product_id"] = $id;
            $productComment["user_id"] = $user->id;
            $productComment["name"] = $user->user_profile->first_name;

            $productComment = $this->ProductComments->patchEntity($productComment,$data);
            if ($this->ProductComments->save($productComment)) {
                $this->Flash->success(
                    __("The product comment has been saved.")
                );

                return $this->redirect([
                    "action" => "productview",
                    $product->id,
                ]);
            }
            $this->Flash->error(
                __("The product comment could not be saved. Please, try again.")
            );
        
        }
        
        $this->set(compact("productComment", "product"));
    }

    public function homepage()
    { 
        // $user1 = $this->Authentication->getIdentity();
    


            $key =$this->request->getQuery('key');
            if($key){
                $query=$this->Products->find('all')->Where(['product_title like'=>'%'.$key.'%']);
            }
            else{
                $query=$this->Products;
            }

           $this->paginate= [
            
            'limit' => 5,
            'order' => ['id' => 'DESC']
           ];
           $products = $this->paginate($query);
           $this->set(compact("products"));
        }
    
    public function productedit($id = null)
    {

        $this->viewBuilder()->setLayout('mylayout');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $data = $this->Users->get($uid,['contain'=>['UserProfile']]);


        $productCategories = $this->paginate($this->ProductCategories);

        $this->set(compact("productCategories"));

        $product = $this->Products->get($id, [
            "contain" => [],
        ]);
        $categoryname = $product["product_category"];
        $fileName2 = $product["product_image"];

        if ($this->request->is(["patch", "post", "put"])) {
            $data1 = $this->request->getData();

            $productImage = $this->request->getData("edit_image");
            $fileName = $productImage->getClientFilename();
            if ($fileName == "") {
                $fileName = $fileName2;
            }

            $data["product_image"] = $fileName;

            $productcategory = $this->request->getData("product_category");
            if ($productcategory == "") {
                $data["product_category"] = $categoryname;
            }

            $product = $this->Products->patchEntity($product, $data1);
            if ($this->Products->save($product)) {
                $this->Flash->success(__("The product edit has been saved."));
                return $this->redirect(["action" => "adminpanel"]);

            }
            $this->Flash->error(
                __("The product could not be saved. Please, try again.")
            );
        }
        $this->set(compact("product",'data'));
    }

    public function productdelete($id = null)
    {
        $this->request->allowMethod(["post", "delete"]);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__("The product has been deleted."));
        } else {
            $this->Flash->error(
                __("The product could not be deleted. Please, try again.")
            );
        }

        return $this->redirect(["action" => "adminpanel"]);
    }
    public function userlist()
    {


        $this->viewBuilder()->setLayout('mylayout');

        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        if($user->status == 0){
            
            return $this->redirect(["action" => "logout"]);
        }
        $data = $this->Users->get($uid,['contain'=>['UserProfile']]);
        $users = $this->paginate($this->Users, ["contain" => "UserProfile"]);
        
        $this->set(compact("users",'data'));
    
}

    public function adminproductview($id = null)
    {
        $this->viewBuilder()->setLayout("mylayout");

        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $data = $this->Users->get($uid,['contain'=>['UserProfile']]);

        $product = $this->Products->get($id, [
            "contain" => ["ProductComments"],
        ]);

        $this->set(compact("product",'data'));
    }
    public function commentdelete($id = null, $productid = null)
    {
        $this->request->allowMethod(["post", "delete"]);
        $productComment = $this->ProductComments->get($id);
        if ($this->ProductComments->delete($productComment)) {
            $this->Flash->success(__("The product comment has been deleted."));
        } else {
            $this->Flash->error(
                __(
                    "The product comment could not be deleted. Please, try again."
                )
            );
        }

        return $this->redirect(["action" => "adminproductview", $productid]);
    }
    public function productdetails()
    {

            $products = $this->paginate($this->Products,[

            'limit'=>5,
            'order' => ['id' => 'DESC']       


            ]);
            
            $this->set(compact("products"));
    }
        
        
        
    
    public function editcategory($id = null)
    {

        $this->viewBuilder()->setLayout("mylayout");
        
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $data = $this->Users->get($uid,['contain'=>['UserProfile']]);

        $productCategory = $this->ProductCategories->get($id, [
            "contain" => [],
        ]);
        if ($this->request->is(["patch", "post", "put"])) {
            $productCategory = $this->ProductCategories->patchEntity(
                $productCategory,
                $this->request->getData()
            );
            if ($this->ProductCategories->save($productCategory)) {
                $this->Flash->success(
                    __("The product category has been saved.")
                );

                return $this->redirect([
                    "action" => "viewcategory",
                    $productCategory->id,
                ]);
            }
            $this->Flash->error(
                __(
                    "The product category could not be saved. Please, try again."
                )
            );
        }
        $this->set(compact("productCategory",'data'));
    }

    public function productCategorystatus($id = null, $status = null)
    {
        $this->request->allowMethod(["post"]);

        $productCategory = $this->ProductCategories->get($id);

        if ($status == 1) {
            $productCategory->status = 0;
        } else {
            $productCategory->status = 1;
        }

        if ($this->ProductCategories->save($productCategory)) {
            $this->Flash->success(__("The status has been deleted."));
        } else {
            $this->Flash->error(
                __("The status could not be deleted. Please, try again.")
            );
        }

        return $this->redirect(["action" => "viewcategory"]);
    }

    public function deletecategory($id = null)
    {
        $this->request->allowMethod(["post", "delete"]);
        $productCategory = $this->ProductCategories->get($id);
        if ($this->ProductCategories->delete($productCategory)) {
            $this->Flash->success(__("The product category has been deleted."));
        } else {
            $this->Flash->error(
                __(
                    "The product category could not be deleted. Please, try again."
                )
            );
        }

        return $this->redirect([
            "action" => "viewcategory",
            $productCategory->id,
        ]);
    }
    public function index1()
    {
        $contact = new ContactForm();
        if ($this->request->is('post')) {
            if ($contact->execute($this->request->getData())) {
                $this->Flash->success('We will get back to you soon.');
            } else {
                $this->Flash->error('There was a problem submitting your form.');
            }
        }
        $this->set('contact', $contact);
    }
   
}
