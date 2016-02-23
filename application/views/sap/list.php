
<div class="container" >
    <?php if (empty($listId)): ?>
    <div class="row first-row">
        <?= form_open('sap/save_list'); ?>
            <input type="text" name="first_name" placeholder="First Name"><br />
            <input type="text" name="last_name" placeholder="Last Name"><br />
            <input type="text" name="email" placeholder="email"><br />
            <input type="password" name="password" placeholder="password to access your list later"><br />
            <input type="text" name="list_name" placeholder="name of the list"><br />
            <input type="submit" value="Create List"><br />
        <?= form_close(); ?>
    </div>


    <?php else: ?>


    <div class="row first-row">
        <div class="col-sm-3"></div>
        <?= form_open('sap/save_list_item', ['id'=>'save_item_form']); ?>
        <div class="col-sm-4">
            <input type="hidden" name="list_id" value="<?= $listId; ?>" id="listId">
            <input type="text" class="form-control" name="list_item" id="item_text">
        </div>
        <div class="col-sm-2">
            <button name="addItem" id="add_item_btn" >Add Item</button>
        </div>
        <?= form_close(); ?>
        <div class="col-sm-3"></div>
    </row>
    <br />
    <br />
    <div class="row" >
        <div class="col-md-3"></div>
        <div class="col-md-6" id="list"></div>
        <div class="col-md-3"></div>
    </div>


    <?php endif; ?>
    

</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript">
"use strict";

var List = React.createClass({
    displayName: "List",
    getInitialState: function getInitialState() {
        return { listItems: [] };
    },
    componentDidMount: function componentDidMount() {
        this.loadFromServer();
        setInterval(this.loadFromServer, 2000);
    },
    loadFromServer: function loadFromServer() {
        var listId = $('#listId').val();
        var url = "http://varunshrivastava.in/sap/getListItems/" + listId;
        $.ajax({
            url: url,
            type: 'GET',
            success: function success(data) {
                data = $.parseJSON(data);
                this.setState({ listItems: data });
                console.log(this.state.listItems);
            }.bind(this),
            error: function error(xhr, status, msg) {
                console.log(xhr.responseText);
            }.bind(this)
        });
    },
    // renders list items
    render: function render() {
        return React.createElement(
            "ul",
            { className: "list-group" },
            this.state.listItems.map(function (item) {
                return React.createElement(
                    "li",
                    { className: "list-group-item", id: item.id},
                    item.list_item
                );
            })
        );
    }
});

ReactDOM.render(React.createElement(List, null), document.getElementById('list'));
</script>


<script type="text/javascript">


    $(document).ready(function (){


        $('#save_item_form').submit(function (e) {
            e.preventDefault();
            var itemInput = $('#item_text');
            var url = $(this).attr('action');
            var data = $(this).serialize();

            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                success: function (data){
                    $(itemInput).val("");
                },
                error: function (xhr, status, msg){
                    console.log(xhr.responseText);
                }
            });
        });

    })
</script>
