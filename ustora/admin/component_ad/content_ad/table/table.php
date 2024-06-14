<?php 
    $pages = 'table';

    $data = array(
        array(
            'name' => 'Bacsic Table',
            'type' => '',
            'list' => array(
                array(
                    'count' => 1,
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => 'jhon@email.com'
                ),
                array(
                    'count' => 2,
                    'first_name' => 'Mark',
                    'last_name' => 'Otto',
                    'email' => 'mark@email.com'
                ),
                array(
                    'count' => 3,
                    'first_name' => 'Jacob',
                    'last_name' => 'Thornton',
                    'email' => 'jacob@email.com'
                )
            )
        ),
        array(
            'name' => 'Accented Table',
            'type' => 'table-striped',
            'list' => array(
                array(
                    'count' => 1,
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => 'jhon@email.com'
                ),
                array(
                    'count' => 2,
                    'first_name' => 'Mark',
                    'last_name' => 'Otto',
                    'email' => 'mark@email.com'
                ),
                array(
                    'count' => 3,
                    'first_name' => 'Jacob',
                    'last_name' => 'Thornton',
                    'email' => 'jacob@email.com'
                )
            )
                ),
                array(
            'name' => 'Hoverable Table',
            'type' => 'table-hover',
            'list' => array(
                array(
                    'count' => 1,
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => 'jhon@email.com'
                ),
                array(
                    'count' => 2,
                    'first_name' => 'Mark',
                    'last_name' => 'Otto',
                    'email' => 'mark@email.com'
                ),
                array(
                    'count' => 3,
                    'first_name' => 'Jacob',
                    'last_name' => 'Thornton',
                    'email' => 'jacob@email.com'
                )
            )
                ),
                array(
            'name' => 'Color Table',
            'type' => 'table-dark',
            'list' => array(
                array(
                    'count' => 1,
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => 'jhon@email.com'
                ),
                array(
                    'count' => 2,
                    'first_name' => 'Mark',
                    'last_name' => 'Otto',
                    'email' => 'mark@email.com'
                ),
                array(
                    'count' => 3,
                    'first_name' => 'Jacob',
                    'last_name' => 'Thornton',
                    'email' => 'jacob@email.com'
                )
            )
                ),
                array(
            'name' => 'Bordered Table',
            'type' => 'table-bordered',
            'list' => array(
                array(
                    'count' => 1,
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => 'jhon@email.com'
                ),
                array(
                    'count' => 2,
                    'first_name' => 'Mark',
                    'last_name' => 'Otto',
                    'email' => 'mark@email.com'
                ),
                array(
                    'count' => 3,
                    'first_name' => 'Jacob',
                    'last_name' => 'Thornton',
                    'email' => 'jacob@email.com'
                )
            )
                ),
                array(
                    'name' => 'Table Without Border',
                    'type' => 'table-borderless',
                    'list' => array(
                        array(
                            'count' => 1,
                            'first_name' => 'John',
                            'last_name' => 'Doe',
                            'email' => 'jhon@email.com'
                        ),
                        array(
                            'count' => 2,
                            'first_name' => 'Mark',
                            'last_name' => 'Otto',
                            'email' => 'mark@email.com'
                        ),
                        array(
                            'count' => 3,
                            'first_name' => 'Jacob',
                            'last_name' => 'Thornton',
                            'email' => 'jacob@email.com'
                        )
                    )
                )
        
    )
?>

<div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <?php foreach($data as $key => $value){ ?>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <?php echo $value['name'] ?>
                            <table class="table <?php echo $value['type'] ?>">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach($value['list'] as $key => $item){ ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $item['count'] ?>
                                            </th>
                                            <td>
                                                <?php echo $item['first_name'] ?>
                                            </td>
                                            <td>
                                                <?php echo $item['last_name'] ?></td>
                                            <td>
                                                <?php echo $item['email'] ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>

                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                        <p class="mb-4">Responsive Table</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Country</th>
                                            <th scope="col">ZIP</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>jhon@email.com</td>
                                            <td>USA</td>
                                            <td>123</td>
                                            <td>Member</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>mark@email.com</td>
                                            <td>UK</td>
                                            <td>456</td>
                                            <td>Member</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>jacob@email.com</td>
                                            <td>AU</td>
                                            <td>789</td>
                                            <td>Member</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>