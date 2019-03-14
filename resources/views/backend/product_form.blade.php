@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <style media="screen">
        .datatables-image {
          width: 50px;
          height: 50px;
        }
    </style>
@endsection

@section('content')
    <div class="container" style="min-height: 100vh;">
        @include('includes._info-box')
            @include('includes._admin-create-product-form')
            <div class="">
                <table class="table table-bordered" id="products-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>

    </div>
@endsection

@section('jquery')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          table = $('#products-table').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax": "{!! route('products.datatable') !!}",
              "columns": [
                  {data: 'name', name: 'name'},
                  {data: 'image', name: 'image'},
                  {data: 'price', name: 'price'},
                  {data: 'sale_price', name: 'sale_price'},
                  {data: 'description', name: 'description'},
                  {data: 'actions', name: 'actions', orderable: false, searchable: false}
              ],
              order: [[0, 'asc']]
          });
        });
    </script>

    <script type="text/javascript">
        var addedCategoriesText, addedCategoriesIDs,
        addedTagsText, addedTagsIDs,
        addedSizesText, addedSizesIDs;

        $( document ).ready(function() {
          
            var addCategoryBtn = document.getElementsByClassName('add-category-btn')[0];
            addedCategoriesIDs = document.getElementById('categories');

            var addTagBtn = document.getElementsByClassName('add-tag-btn')[0];
            addedTagsIDs = document.getElementById('tags');

            var addSizeBtn = document.getElementsByClassName('add-size-btn')[0];
            addedSizesIDs = document.getElementById('sizes');
            
            addCategoryBtn.addEventListener('click', addCategoryToProduct);
            addedCategoriesText = document.getElementsByClassName('added-categories')[0];//div

            addTagBtn.addEventListener('click', addTagToProduct);
            addedTagsText = document.getElementsByClassName('added-tags')[0];//div

            addSizeBtn.addEventListener('click', addSizeToProduct);
            addedSizesText = document.getElementsByClassName('added-sizes')[0];//div
           
            for(i = 0; i < addedCategoriesText.firstElementChild.children.length; i++)
            {
              addedCategoriesText.firstElementChild.children[i].firstElementChild.addEventListener('click', removeCategoryFromProduct);
            }

            for(i = 0; i < addedTagsText.firstElementChild.children.length; i++)
            {
              addedTagsText.firstElementChild.children[i].firstElementChild.addEventListener('click', removeTagFromProduct);
            }

            for(i = 0; i < addedSizesText.firstElementChild.children.length; i++)
            {
              addedSizesText.firstElementChild.children[i].firstElementChild.addEventListener('click', removeSizeFromProduct);
            }
            
        });
        
        function addCategoryToProduct(event) {
            event.preventDefault();
            var select = document.getElementById('category_select');
            var selectedCategoryId = select.options[select.selectedIndex].value;
            var selectedCategoryName = select.options[select.selectedIndex].text;

            if(addedCategoriesIDs.value.split(',').indexOf(selectedCategoryId) != -1) {
            return; 
            }                                                                          
            if(addedCategoriesIDs.value.length > 0) {
            addedCategoriesIDs.value = addedCategoriesIDs.value + ',' + selectedCategoryId;
            } else {
            addedCategoriesIDs.value = selectedCategoryId;
            }
            
            var newCategoryLi = document.createElement('li');
            var newCategoryLink = document.createElement('a');
            newCategoryLink.href = "#";
            newCategoryLink.innerText = selectedCategoryName;
            newCategoryLink.dataset['category_id'] = selectedCategoryId;
            newCategoryLink.addEventListener('click', removeCategoryFromProduct);
            newCategoryLi.appendChild(newCategoryLink);
            addedCategoriesText.firstElementChild.appendChild(newCategoryLi);

        }

        function addTagToProduct(event) {
            event.preventDefault();
            var select = document.getElementById('tag_select');
            var selectedTagId = select.options[select.selectedIndex].value;
            var selectedTagName = select.options[select.selectedIndex].text;

            if(addedTagsIDs.value.split(',').indexOf(selectedTagId) != -1) {
            return; 
            }                                                                       
            if(addedTagsIDs.value.length > 0) {
            addedTagsIDs.value = addedTagsIDs.value + ',' + selectedTagId;
            } else {
            addedTagsIDs.value = selectedTagId;
            }
            //create visual for frontend
            var newTagLi = document.createElement('li');
            var newTagLink = document.createElement('a');
            newTagLink.href = "#";
            newTagLink.innerText = selectedTagName;
            newTagLink.dataset['tag_id'] = selectedTagId;
            newTagLink.addEventListener('click', removeTagFromProduct);
            newTagLi.appendChild(newTagLink);
            addedTagsText.firstElementChild.appendChild(newTagLi);

        }

        function addSizeToProduct(event) {
            event.preventDefault();
            var select = document.getElementById('size_select');
            var selectedSizeId = select.options[select.selectedIndex].value;
            var selectedSizeName = select.options[select.selectedIndex].text;

            if(addedSizesIDs.value.split(',').indexOf(selectedSizeId) != -1) {
            return; 
            }       
            if(addedSizesIDs.value.length > 0) {
            addedSizesIDs.value = addedSizesIDs.value + ',' + selectedSizeId;
            } else {
            addedSizesIDs.value = selectedSizeId;
            }
            
            var newSizeLi = document.createElement('li');
            var newSizeLink = document.createElement('a');
            newSizeLink.href = "#";
            newSizeLink.innerText = selectedSizeName;
            newSizeLink.dataset['size_id'] = selectedSizeId;
            newSizeLink.addEventListener('click', removeSizeFromProduct);
            newSizeLi.appendChild(newSizeLink);
            addedSizesText.firstElementChild.appendChild(newSizeLi);

        }

        //remove*FromProduct
        function removeCategoryFromProduct(event) {
            event.preventDefault();
            event.target.removeEventListener('click', removeCategoryFromProduct);
            var categoryId = event.target.dataset['category_id'];
          
            var categoryIDArray = addedCategoriesIDs.value.split(',');
            var index = categoryIDArray.indexOf(categoryId);
            categoryIDArray.splice(index, 1);
            var newCategoriesIDs = categoryIDArray.join(',');
            addedCategoriesIDs.value = newCategoriesIDs;
            event.target.parentElement.remove();
        }

        function removeTagFromProduct(event) {
            event.preventDefault();
            event.target.removeEventListener('click', removeTagFromProduct);
            var tagId = event.target.dataset['tag_id'];
           
            var tagIDArray = addedTagsIDs.value.split(',');
            var index = tagIDArray.indexOf(Id);
            tagIDArray.splice(index, 1);
            var newTagsIDs = tagIDArray.join(',');
            addedTagsIDs.value = newTagsIDs;
            event.target.parentElement.remove();
        }

        function removeSizeFromProduct(event) {
            event.preventDefault();
            event.target.removeEventListener('click', removeSizeFromProduct);
            var Id = event.target.dataset['size_id'];
           
            var sizeIDArray = addedSizesIDs.value.split(',');
            var index = sizeIDArray.indexOf(Id);
            sizeIDArray.splice(index, 1);
            var newSizesIDs = sizeIDArray.join(',');
            addedSizesIDs.value = newSizesIDs;
            event.target.parentElement.remove();
        }
    </script>
@endsection
