
<div class="vertical-menu vertical-category-block">
                            <div class="block-title">
                                <span class="menu-icon">
                                    <span class="line-1"></span>
                                    <span class="line-2"></span>
                                    <span class="line-3"></span>
                                </span>
                                <span class="menu-title">All Categories</span>
                                <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>

                            <div class="wrap-menu">
                                <ul class="menu clone-main-menu">

                                    <?php
                                        foreach($catDatas as $data) {
                                        
                                     ?>

                                    <li class="menu-item menu-item-has-children has-megamenu">
                                        <a href="category.php?status=catView&&id=<?php echo $data['category_id'] ?>" class="menu-name" data-title="<?php echo $data['category_name'] ?>"><?php echo $data['category_name'] ?>
                                        </a>

                                    </li>

                                    <?php } ?>
                                </ul>
                            </div>
                        </div>