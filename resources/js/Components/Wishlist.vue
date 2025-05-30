<template>
  <div class="whistlist-section mt-110 mb-110">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="whistlist-table">
                        <table class="eg-table2">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    <td>
                                        <div class="delete-icon">
                                            <i class="bi bi-x-lg"></i>
                                        </div>
                                    </td>
                                    <td data-label="Product" class="table-product">
                                        <div class="product-img">
                                            <img src="assets/img/inner-page/whistlist-img4.png" alt="">
                                        </div>
                                        <div class="product-content">
                                            <h6>New Botanical Shampoo</h6>
                                        </div>
                                    </td>
                                    <td data-label="Price">
                                        <p class="price">
                                            <del>$40.00</del>
                                            $27.00
                                        </p>
                                    </td>
                                    <td data-label="Stock">
                                        <span>In Stock</span>
                                    </td>
                                    <td>
                                        <Link href="/cart" class="add-cart-btn hover-btn2"><i class="bi bi-bag-check"></i>Add To Cart</Link>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="delete-icon">
                                            <i class="bi bi-x-lg"></i>
                                        </div>
                                    </td>
                                    <td data-label="Product" class="table-product">
                                        <div class="product-img">
                                            <img src="assets/img/inner-page/whistlist-img4.png" alt="">
                                        </div>
                                        <div class="product-content">
                                            <h6>New Botanical Shampoo</h6>
                                        </div>
                                    </td>
                                    <td data-label="Price">
                                        <p class="price">
                                            <del>$40.00</del>
                                            $27.00
                                        </p>
                                    </td>
                                    <td data-label="Stock">
                                        <span>In Stock</span>
                                    </td>
                                    <td>
                                        <Link href="/cart" class="add-cart-btn hover-btn2"><i class="bi bi-bag-check"></i>Add To Cart</Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';


</script>

<style scoped>

</style>