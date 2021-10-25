@php
    $categories=App\Models\Category::OrderBy('category_name_en','ASC')->get();
@endphp
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        @foreach ($categories as  $category)
          
        
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="icon fa {{ $category->category_icon }}" aria-hidden="true">
            </i>{{ session()->get('language')=='bangla' ? $category->category_name_ban:$category->category_name_en }}</a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">

             @php
               $sub=App\Models\SubCategory::where('category_id',$category->id)->OrderBy('subcategory_name_en','ASC')->get();
             @endphp
               @foreach ( $sub as  $subcategory)
                 
              
                <div class="col-sm-12 col-md-3">
                  <a href="{{ route('subcategory.product.view',$subcategory->id) }}">
                     <h2 class="title">{{ session()->get('language')=='bangla'? $subcategory->subcategory_name_ban: $subcategory->subcategory_name_en }}</h2>
                  </a>

                  @php
                    $subsub=App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->OrderBy('subsubcategory_name_en','ASC')->get();
                  @endphp
                  @foreach ($subsub as $subsubcategory)
              
                  <ul class="links list-unstyled">

                    
                    <li><a href="{{ route('subsubcategory.product.view',$subsubcategory->id) }}">{{ session()->get('language')=='bangla'?  $subsubcategory->subsubcategory_name_ban:
                    $subsubcategory->subsubcategory_name_en }}</a></li>
                    
                    
                  </ul>
                  @endforeach
                </div>
                <!-- /.col -->

                @endforeach

             
           
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> 
        </li>
        @endforeach
        <!-- /.menu-item -->
        
        
  
        
    
        
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> 
          <!-- /.dropdown-menu --> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
        <!-- /.menu-item -->
        
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a> 
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>