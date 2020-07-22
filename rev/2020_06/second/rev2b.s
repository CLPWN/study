_start:
  mov rax, 1 
  mov rbx, 1 
  mov rcx, 1
.loop:
  mov rdx, rbx
  add rbx, rax
  mov rax, rdx
  inc rcx
  cmp rcx, 60
  jnz .loop
_end: 
  hlt
