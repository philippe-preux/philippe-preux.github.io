# 
# Makefile
# for yaStoSOO v.0.3
# For use with gcc under Linux, otherwise update!
#

NAME1=stosoo_2sine
XEQ1=$(NAME1)
SRC1=stosoo.c stosoo_optim.c Malloc.c rnd_normal.c print.help.c 2sine.c

NAME2=stosoo_garland
XEQ2=$(NAME2)
SRC2=stosoo.c stosoo_optim.c Malloc.c rnd_normal.c print.help.c garland.c

NAME3=stosoo_para
XEQ3=$(NAME3)
SRC3=stosoo.c stosoo_optim.c Malloc.c rnd_normal.c print.help.c paraboloid.c

FLAGS=	-I$(INCLDIR) -O3 \
	-std=c99 -pedantic -Wall -Wextra -Wstrict-prototypes \
	-Wtraditional-conversion -Wpointer-arith -Wcast-qual \
	-Wcast-align -Wwrite-strings -Wnested-externs \
	-fgnu89-inline -fshort-enums -fno-common  \
	-fstrict-aliasing -flto \
	-fipa-pta -fipa-sra -fipa-cp -fipa-cp-clone \
	-fstrict-aliasing -finline-functions \
	-fexpensive-optimizations -ftree-loop-if-convert \
	-fprefetch-loop-arrays -falign-functions -falign-loops \
	-fomit-frame-pointer -lm

all: $(NAME1) $(NAME2) $(NAME3)

$(NAME1): $(SRC1)
	gcc -o $(XEQ1) $(SRC1) $(FLAGS) 

$(NAME2): $(SRC2)
	gcc -o $(XEQ2) $(SRC2) $(FLAGS) 

$(NAME3): $(SRC3)
	gcc -o $(XEQ3) $(SRC3) $(FLAGS) 

clean:
	rm $(XEQ1) $(XEQ2) $(XEQ3)

