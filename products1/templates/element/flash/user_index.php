<div class="table-responsive table--no-card m-b-40">
     <table class="table table-borderless table-striped table-earning"id="">
             <thead>
                    <tr>
                        <th>id</th>
                        <th>product title</th>
                        <th>product description</th>
                        <th>product category</th>
                        <th>product image</th>
                         <th>product tags</th>
                         <th>status</th>
                         <th>created date</th>
                        <th>Actions</th>
                        <input type="button" onclick=deletesweet() value="delete">

                    </tr>
             </thead>
                         <tbody>
                         <?php $n=1;?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= $this->Number->format($n) ?></td>
                                <td id="test"><?= h($product->product_title) ?></td>
                                <td><?= h($product->product_description) ?></td>
                                 <td><?= h($product->product_category) ?></td>
                                 <td><?= $this->Html->image($product->product_image,['width'=>'100px']) ?></td>
                                <td><?= h($product->product_tags) ?></td>
                                <?php if($product->status ==1) :?>
                                 <td><?= $this->Form->postLink(__('active'), ['action' => 'productstatus',$product->id,$product->status],
                                 ['confirm' => __('Are you sure you want to inactive # {0}?', $product->id)]) ?></td>
                                <?php else :?>
                                 <td><?= $this->Form->postLink(__('inactive'), ['action' => 'productstatus', $product->id,$product->status],
                                 ['confirm' => __('Are you sure you want to active # {0}?', $product->id)]) ?>
                             <?php endif;?> 
                              </td>
                                <td><?= h($product->created_date) ?></td>
                                <td class="actions">

                                <?= $this->Html->link(__('View'), ['action' => 'adminproductview', $product->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'productedit', $product->id]) ?>
                             <input type="button"  class='btn btn-primary' onclick=deletesweet() value="delete" name="Delete" >
                                                
                             <?= $this->Form->postLink(__('Delete'),['action' => 'productdelete', $product->id ],['confirm' => __('Are you sure you want to delete # {0}?')]); ?>
                            </td>
                            </tr>
                            <?php $n++;?>
                                            <?php endforeach; ?>
                                        </tbody>
                
                                    </table>
                                  
                                </div>