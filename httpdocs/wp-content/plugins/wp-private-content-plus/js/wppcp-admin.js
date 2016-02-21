jQuery(document).ready(function($) {
    if($("#wppcp_private_page_user").length){
        $("#wppcp_private_page_user").select2({
          ajax: {
            url: WPPCPAdmin.AdminAjax,
            dataType: 'json',
            delay: 250,
            method: "POST",
            data: function (params) {
              return {
                q: params.term, // search term
                page: params.page,
                action: 'wppcp_load_private_page_users',
              };
            },
            processResults: function (data, page) {
              return {
                results: data.items
              };
            },
            cache: true
          },
          escapeMarkup: function (markup) { return markup; }, 
          minimumInputLength: 1,
          templateResult: wppcp_formatRepo, 
          templateSelection: wppcp_formatRepoSelection 
        });
    }
    
    $("#wppcp_private_page_user_load_form").submit(function(e){
        
        $("#wppcp-message").removeClass('wppcp-message-info-error').removeClass('wppcp-message-info-success').hide();
        
        if($("#wppcp_private_page_user").val() == '0'){
            e.preventDefault();
            $("#wppcp-message").addClass('wppcp-message-info-error');
            $("#wppcp-message").html(WPPCPAdmin.Messages.userEmpty).show();
        }
    });
    
    if($("#wppcp-role-hierarchy-list").length > 0){
        $( "#wppcp-role-hierarchy-list" ).sortable({
            update: function(e,ui){
                
                var user_role_hierarchy = new Array();
                $( "#wppcp-role-hierarchy-list li" ).each(function(){
                    var role = $(this).attr('data-role');
                    user_role_hierarchy.push(role);
                });


                $.post(
                    WPPCPAdmin.AdminAjax,
                    {
                        'action': 'wppcp_save_user_role_hierarchy',
                        'user_role_hierarchy':   user_role_hierarchy,
                    },
                    function(response){

                    }
                );

                
            },
        });
    }

    $("#wppcp_post_page_visibility").change(function(e){
        if($(this).val() == 'role'){
            $("#wppcp_post_page_role_panel").show();
        }else{
            $("#wppcp_post_page_role_panel").hide();
        }
    });

    

    
    
    


    if($("#wppcp_blocked_post_search").length){
        $("#wppcp_blocked_post_search").select2({
          ajax: {
            url: WPPCPAdmin.AdminAjax,
            dataType: 'json',
            delay: 250,
            method: "POST",
            data: function (params) {
              return {
                q: params.term, // search term
                action: 'wppcp_load_published_posts',
              };
            },
            processResults: function (data, page) {
              return {
                results: data.items
              };
            },
            cache: true
          },
          escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
          minimumInputLength: 1,
          templateResult: wppcp_formatRepo, // omitted for brevity, see the source of this page
          templateSelection: wppcp_formatRepoSelection // omitted for brevity, see the source of this page
        });
    }

    if($("#wppcp_blocked_page_search").length){
        $("#wppcp_blocked_page_search").select2({
          ajax: {
            url: WPPCPAdmin.AdminAjax,
            dataType: 'json',
            delay: 250,
            method: "POST",
            data: function (params) {
              return {
                q: params.term, // search term
                action: 'wppcp_load_published_pages',
              };
            },
            processResults: function (data, page) {
              return {
                results: data.items
              };
            },
            cache: true
          },
          escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
          minimumInputLength: 1,
          templateResult: wppcp_formatRepo, // omitted for brevity, see the source of this page
          templateSelection: wppcp_formatRepoSelection // omitted for brevity, see the source of this page
        });
    }

    if($("#wppcp_everyone_search_types").length){
        $("#wppcp_everyone_search_types").select2();
    }
    if($("#wppcp_guests_search_types").length){$("#wppcp_guests_search_types").select2();}
    if($("#wppcp_members_search_types").length){$("#wppcp_members_search_types").select2();}
    if($(".wppcp-select2-role-search-types").length){$(".wppcp-select2-role-search-types").select2();}
    if($(".wppcp-select2-post-type-setting").length){$(".wppcp-select2-post-type-setting").select2();}


    if($(".wppcp-select2-post-type-setting").length){
        $(".wppcp-select2-post-type-setting").each(function(){
            var post_type = $(this).attr('data-post-type');
            $(this).select2({
              ajax: {
                url: WPPCPAdmin.AdminAjax,
                dataType: 'json',
                delay: 250,
                method: "POST",
                data: function (params) {
                  return {
                    q: params.term, // search term
                    post_type : post_type,
                    action: 'wppcp_load_published_cpt',
                  };
                },
                processResults: function (data, page) {
                  return {
                    results: data.items
                  };
                },
                cache: true
              },
              escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
              minimumInputLength: 1,
              templateResult: wppcp_formatRepo, // omitted for brevity, see the source of this page
              templateSelection: wppcp_formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
        
    }
});

function wppcp_formatRepo (repo) {
    if (repo.loading) return repo.text;

    var markup = '<div class="clearfix">' +
    '<div class="col-sm-1">' +
    '' +
    '</div>' +
    '<div clas="col-sm-10">' +
    '<div class="clearfix">' +
    '<div class="col-sm-6">' + repo.name + '</div>' +
    '</div>';


    markup += '</div></div>';

    return markup;
}

function wppcp_formatRepoSelection (repo) {
    return repo.name || repo.text;
}