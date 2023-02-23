<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reaction Controller
 *
 * @property \App\Model\Table\ReactionTable $Reaction
 * @method \App\Model\Entity\Reaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReactionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Products'],
        ];
        $reaction = $this->paginate($this->Reaction);

        $this->set(compact('reaction'));
    }

    /**
     * View method
     *
     * @param string|null $id Reaction id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reaction = $this->Reaction->get($id, [
            'contain' => ['Users', 'Products'],
        ]);

        $this->set(compact('reaction'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

     

    public function add($id = null)
    {
        if($user = $this->Authentication->getIdentity()){

            $like = $this->Reaction->find('all')->where(['user_id' => $user->id,'product_id'=> $id])->all();

            $likearray = array();
            foreach($like as $likes){
                $likearray[] =+ $likes->items;
            }

        if(!empty($likearray)){

            $upvote = $this->Reaction->find('all')->where(['user_id' => $user->id,'product_id'=> $id])->first();

            if($upvote->upvote == 1){
                $upvote = $this->Reaction->patchEntity($upvote, $this->request->getData());
                $upvote->upvote = 0;
                $upvote->downvote = 0;
                if ($this->Reaction->save($upvote)) {
                    $this->Flash->success(__('The reaction has been saved.'));
    
                    return $this->redirect(['controller'=>'users','action' => 'productview',$id]);
                }
                $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
                return $this->redirect(['controller'=>'users','action' => 'productview',$id]);

            }else{
           
                $upvote = $this->Reaction->patchEntity($upvote, $this->request->getData());
                $upvote->upvote = 1;
                $upvote->downvote = 0;
                if ($this->Reaction->save($upvote)) {
                    $this->Flash->success(__('The reaction has been saved.'));
    
                    return $this->redirect(['controller'=>'users','action' => 'productview',$id]);
                }
                $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
                return $this->redirect(['controller'=>'users','action' => 'productview',$id]);
            }
     }

        
        $reaction = $this->Reaction->newEmptyEntity();
         
        $reaction->user_id=$user->id;
        $reaction->product_id=$id;
        $reaction->upvote = 1;
        
            if ($this->Reaction->save($reaction)) {
                $this->Flash->success(__('The reaction has been saved.'));

                return $this->redirect(['controller'=>'users','action' => 'productview',$id]);
            }else{
            $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
            return $this->redirect(['controller'=>'users','action' => 'productview',$id]);
            }
        
       
    }
    else{
        $this->Flash->error(__('not like product plaese login.'));
        return $this->redirect(['controller'=>'users','action' => 'login']);

    }
}
public function dislike($id = null)
    {
        if($user = $this->Authentication->getIdentity()){

            $like = $this->Reaction->find('all')->where(['user_id' => $user->id,'product_id'=> $id])->all();
            // dd($like);
            $likearray = array();
            foreach($like as $likes){
                $likearray[] =+ $likes->items;
            }

        if(!empty($likearray)){
            $upvote = $this->Reaction->find('all')->where(['user_id' => $user->id,'product_id'=> $id])->first();
            if($upvote->downvote == 1){
                $upvote = $this->Reaction->patchEntity($upvote, $this->request->getData());
                $upvote->upvote = 0;
                $upvote->downvote = 0;
                if ($this->Reaction->save($upvote)) {
                    $this->Flash->success(__('The reaction has been saved.'));
    
                    return $this->redirect(['controller'=>'users','action' => 'productview',$id]);
                }
                $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
                return $this->redirect(['controller'=>'users','action' => 'productview',$id]);

            }else{
           
                $upvote = $this->Reaction->patchEntity($upvote, $this->request->getData());
                $upvote->upvote = 0;
                $upvote->downvote = 1;
                if ($this->Reaction->save($upvote)) {
                    $this->Flash->success(__('The reaction has been saved.'));
    
                    return $this->redirect(['controller'=>'users','action' => 'productview',$id]);
                }
                $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
                return $this->redirect(['controller'=>'users','action' => 'productview',$id]);
            }
            }

        
        $reaction = $this->Reaction->newEmptyEntity();
        
           
        $reaction->user_id=$user->id;
        $reaction->product_id=$id;
        $reaction->downvote = 1;
        
            if ($this->Reaction->save($reaction)) {
                $this->Flash->success(__('The reaction has been saved.'));

                return $this->redirect(['controller'=>'users','action' => 'productview',$id]);
            }else{
            $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
            return $this->redirect(['controller'=>'users','action' => 'productview',$id]);
            }
    }
    else{
        $this->Flash->error(__('not like product plaese login.'));
        return $this->redirect(['controller'=>'users','action' => 'login']);
    }

}

    /**
     * Edit method
     *
     * @param string|null $id Reaction id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reaction = $this->Reaction->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reaction = $this->Reaction->patchEntity($reaction, $this->request->getData());
            if ($this->Reaction->save($reaction)) {
                $this->Flash->success(__('The reaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
        }
        $users = $this->Reaction->Users->find('list', ['limit' => 200])->all();
        $products = $this->Reaction->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('reaction', 'users', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reaction id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reaction = $this->Reaction->get($id);
        if ($this->Reaction->delete($reaction)) {
            $this->Flash->success(__('The reaction has been deleted.'));
        } else {
            $this->Flash->error(__('The reaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
