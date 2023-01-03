<div class="filter-bar d-flex flex-wrap align-items-center">
    <div class="sorting">
        <select name='sortBy' onchange="this.form.submit();">
            <option value="">Default</option>
            <option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>Name</option>
            <option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>Price</option>
            <option value="category" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='category') selected @endif>Category</option>
            <option value="brand" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='brand') selected @endif>Brand</option>
        </select>
    </div>
    <div class="sorting mr-auto">
        <select name="show" onchange="this.form.submit();">
            <option value="">Default</option>
            <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9') selected @endif>09</option>
            <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15') selected @endif>15</option>
            <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21') selected @endif>21</option>
            <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30') selected @endif>30</option>
        </select>
    </div>
    <div>
        <div class="input-group filter-bar-search">
            <input type="text" placeholder="Search">
            <div class="input-group-append">
                <button type="button"><i class="ti-search"></i></button>
            </div>
        </div>
    </div>
</div>
