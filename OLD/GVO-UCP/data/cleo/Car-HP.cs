  �
P j @��  	CRED445    �
 �q   ~1~ HP      �
�D�   
  �
      �
   
  � )    �  M S���Z   '                  �
5���      � �        1      !�    D1      !�   �CM S����                
       �  1�   �AM S����B� ?��L>��L?   � @ �  � Z  	CRED445  
      mM ���� �����
   �
  �
  �
	  �
0�p             D    �C�
Dp�   �
Hp�   �   �   s   s   k   k   �
   FLAG   SRC ^	  {$CLEO}
 
0000:
0AA8: call_function_method 0x6A0050 0xC1B340 num_params 1 pop 0 'CRED445' 0@ //// Get gxt text address by gxt name
0AA5: call 0x718600 2 pop 2 0@ "~1~ HP"
 
 
1@ = 0
 
while true
    wait 0

    0A8D: 29@ = read_memory 0xB74494 size 4 virtual_protect 0
    29@ += 0x4
    0A8D: 29@ = read_memory 29@ size 4 virtual_protect 0
    for 30@ = 0 to 27904 step 0x100
        0A8D: 31@ = read_memory 29@ size 1 virtual_protect 0
        000A: 29@ += 0x1
        if and
            0029: 31@ >= 0x00
            001B: 0x80 > 31@
        then
            005A: 31@ += 30@
            0227: 5@ = car 31@ health
            
            0407: store_coords_to 2@ 3@ 4@ from_car 31@ with_offset 0.0 0.0 0.0
            0AB1: call_scm_func @getScreenXYFrom3DCoords 3 3D_coords_X 2@ Y 3@ Z 4@ store_screen_X_to 6@ Y_to 7@
            if and
                00C2: sphere_onscreen 2@ 3@ 4@ radius 0.0
                6@ >= 0.0 // Min Size screen X
                6@ <= 640.0 // Max Size screen X
                7@ >= 0.0 // Min Size screen Y
                7@ <= 448.0 // Max Size screen Y
            then
                04C4: store_coords_to 22@ 23@ 24@ from_actor $PLAYER_ACTOR with_offset 0.0 0.0 0.0
                050A: 20@ = distance_between_XYZ 2@ 3@ 4@ and_XYZ 22@ 23@ 24@
                if 20@ < 20.0
                then
                    03F0: enable_text_draw 1
                    0342: set_text_draw_centered 1
                    03E0: draw_text_behind_textures 0
                    033F: set_text_draw_letter_size width 0.20 height 0.80
                    081C: draw_text_outline 1 RGBA 0 0 0 255
                    0340: set_text_draw_RGBA 0 255 0 255
                    045A: draw_text_1number 6@ 7@ GXT 'CRED445' number 5@  //
                end
            end         
        end   
    end
end
 
:getScreenXYFrom3DCoords
0AC7: 14@ = var 0@ offset
0AC7: 15@ = var 3@ offset
0AC7: 16@ = var 6@ offset
0AC7: 17@ = var 9@ offset
0AA5: call 0x70CE30 num_params 6 pop 6 {18@ 18@} 0 0 17@ 16@ 15@ 14@
0007: 12@ = 640.0
0007: 13@ = 448.0
0A8D: 14@ = read_memory 0xC17044 size 4 virtual_protect 0
0A8D: 15@ = read_memory 0xC17048 size 4 virtual_protect 0
0093: 14@ = integer 14@ to_float
0093: 15@ = integer 15@ to_float
0073: 12@ /= 14@
0073: 13@ /= 15@
006B: 3@ *= 12@
006B: 4@ *= 13@
0AB2: ret 2 3@ 4@r  __SBFTR 