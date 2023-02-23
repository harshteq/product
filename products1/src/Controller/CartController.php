<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cart Controller
 *
 * @property \App\Model\Table\CartTable $Cart
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Users', 'Products'],
        // ];
        // $cart = $this->paginate($this->Cart);

        // $this->set(compact('cart'));
        // $this->loadModel('Products');
        if($user = $this->Authentication->getIdentity()){

            
            $uid = $user->id;
            
            $cart = $this->Cart->find('all')->contain(['Users', 'Products'])->where(['user_id'=>$uid])->toArray();
            
            // dd($cart);
            // $likearray = array();
            // foreach($cart as $cart){
                //     $likearray[] =+ $cart->items;
                // }
                $this->set(compact('cart'));
            }
            else{

            $this->Flash->error(__('please login and then view product in your cart.'));

            return $this->redirect(['controller'=>'users','action' => 'login']);

            }

            
            
            
            
            //dd($cart);

    }

    /**
     * View method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        
        $cart = $this->Cart->get($id, [
            'contain' => ['Users', 'Products'],
        ]);
      
        $this->set(compact('cart'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {

        if($result = $this->Authentication->getIdentity()){

            $this->paginate = [
                'contain' => ['Users', 'Products'],
            ];
            $carts = $this->paginate($this->Cart); 
            
            
            foreach($carts as $carts){
                if($carts->user_id == $result->id && $carts->product_id == $id){
                    
                    $this->Flash->error(__('The cart already saved.'));
                    
                    return $this->redirect(['controller'=>'users','action' => 'productview',$id]);
                    break;
                }
                
            }
            
            
            $cart = $this->Cart->newEmptyEntity();
            
            
            $cart->user_id = $result->id;
            $cart->product_id = $id;
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));
                
                return $this->redirect(['controller'=>'users','action' => 'productview',$id]);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
            
        }
        else{
            $this->Flash->error(__('please login and then add product in cart.'));

            return $this->redirect(['controller'=>'users','action' => 'login']);
        }
            
        }
        
        /**
         * Edit method
         *
         * @param string|null $id Cart id.
         * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
         * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
         */
        public function increase($id = null)
        {
            $cart = $this->Cart->get($id, [
            'contain' => [],
        ]);

        $cart->quntity = $cart->quntity + 1;
            
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        
        
    }
    public function decrease($id = null)
        {
            $cart = $this->Cart->get($id, [
            'contain' => [],
        ]);

        if($cart->quntity == 1){
            $this->Flash->error(__('At least on quantity required for product in cart'));

                return $this->redirect(['action' => 'index']);

        }

        $cart->quntity = $cart->quntity - 1;
            
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->Authentication->getIdentity();

            $uid = $user->id;
        
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Cart->get($id);
        if ($this->Cart->delete($cart)) {
            $carts = $this->Cart->find('all')->where(['user_id'=>$uid])->first();
            if(empty($carts)){
                $this->Flash->success(__('The cart has been deleted.'));
                return $this->redirect(['controller'=>'users','action' => 'productdetails']);
            }
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'cart','action' => 'index']);
    }
}
