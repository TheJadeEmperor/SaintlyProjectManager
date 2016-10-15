<?

function how_a_guy_gets_laid($money, $time) 
{
    if($ask_a_girl_out == yes)
    {
        if($pay_for_dinner == yes)
        {
            if($go_to_her_house == yes)
            {
                if($bring_a_condom == yes)
                    return success; 
            }
        }
    }
    else
    {   //money makes the world go round
        if($find_a_prostitute == yes && $money == yes) //if prostitute is available, set up appointment
            return success; 
    }
    
}



function how_a_girl_gets_laid($makeup, $nice_looking_dress)
{
    get_ready_to_go_out($fancy_dress, $purse);
    
    does_he_like_me:
    if($does_he_like_me == yes)
    {
        if($maybe_he_has_a_girlfriend)
            check does_he_have_a_girlfriend_routine(); //a complicated analysis to determine if a guy has a girlfriend
        
        if($he_has_a_girlfriend == yes)
        {
            if($do_they_get_along == no)
            {
                if($why_dont_they_get_along)
                {
                    if($are_they_about_to_breakup)
                    {
                        goto get_his_attention;
                    }
                }   
            }
        }    
        else //if no girlfriend
        {
            run why_is_he_single_routine();
            
            run whats_wrong_with_him();
            
            run is_he_gay(); //this program determines if a man is gay or straight, its 500 lines long
            
            goto get_his_attention;
        }
    }
    
    get_his_attention:
        
    if($he_responds_to_my_cues)
    {
        if($is_he_funny && $is_he_smart && $is_he_good_looking)
        {
            if($flirting && $have_a_good_vibe)
            {
                if($he_asks_for_my_number && $give_him_my_number)
                {
                    if($he_asks_me_out)
                    {
                        have_a_conversation:
                        if($flirting && $have_a_good_vibe && $he_said_nothing_stupid)
                        {
                            goto does_he_like_me; //just making sure
                            
                            goto get_his_attention; 
                            
                            invite_him_home_routine();
                           
                            if($flirting && $have_a_good_vibe && $mood_is_right)
                            {
                                go_to_bedroom();

                                return success;
                            }
                            else
                            {
                                goto have_a_conversation;
                            }
                        }
                    }
                }
            }
        }
    }
    else //doesn't respond to cues
    {
        run whats_wrong_with_him(); //this is where they start their complex thinking process
        //this routine is 1000 lines long
            
        run is_he_gay(); 
        
        goto does_he_like_me; 
        
        goto get_his_attention;
    }
}

//routine to call when a woman gets ready for a party or hangout
function get_ready_to_go_out($fancy_dress, $purse)
{   //why women take forever to get ready
    run check_closet_routine();
    
    if($pick_a_dress == true)
    {
        if($check_mirror && $dont_like_it)
        {
            goto check_closet_again; //start over from scratch
        }
        else
        {
            run put_on_makeup(); //this routine is 500 lines long
            
            if($check_mirror && $dont_like_it)
            {
                goto put_on_makeup_again;
            }
            else
            {
                run do_hair();
                
                if($check_mirror && $dont_like_it)
                {
                    goto do_hair_again;
                    
                    if($pick_a_dress && $makeup && $do_hair)
                    {
                        $check_mirror = check_mirror(); //this routine is 400 lines long
                        
                        if($check_mirror == okay)
                        {
                            $check_mirror_again = check_mirror();
                            
                            if($check_mirror_again)
                            {
                                $check_mirror_one_last_time = check_mirror(); 
                                
                                if($check_mirror_one_last_time == okay)
                                {
                                    $ready_to_go_out = true;
                                    return; 
                                }
                                else
                                    goto check_closet_again; //pick a new dress and start over 
                            }
                            else
                                goto check_closet_again; 
                        }
                        else
                        {
                             goto check_closet_again;
                        }
                    }
                }
            }
        }
    }
}

?>