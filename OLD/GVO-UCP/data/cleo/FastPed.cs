 �bKHOI_NGUYENZbFAST PED TURN   �  �
  
  `�      M �����
   �A � �
H�  M <���   ��  )�   M c����
   �@   � ��H� M C��� <��� c��� ����FLAG   SRC �  {$CLEO .cs}

wait 1000
write_debug "KHOI_NGUYENZ"
write_debug "FAST PED TURN"
0@ = -1

:Noname_49
wait 0
get_ped_pointer 1@ = ped $PLAYER_ACTOR
1@ += 1376
if 
  0@ > 0
goto_if_false @Noname_101
write_memory 1@ size 4 value 30.0 virtual_protect 0

:Noname_101
if and
  is_key_pressed 72
  is_button_pressed 0 pressed_key 6
goto_if_false @Noname_200
0@ *= -1
if 
  not 0@ >= 0
goto_if_false @Noname_161
write_memory 1@ size 4 value 7.5 virtual_protect 0

:Noname_161
wait 0
if or
  not is_key_pressed 72
  not is_button_pressed 0 pressed_key 6
goto_if_false @Noname_193
goto @Noname_200

:Noname_193
goto @Noname_161

:Noname_200
goto @Noname_49
�   __SBFTR 