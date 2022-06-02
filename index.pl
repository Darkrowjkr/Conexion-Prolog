vacuna(astrazeneca, 60, 100).
vacuna(pfizer, 50, 60).
vacuna(moderna, 40, 50).
vacuna(casino, 30, 40).
vacuna(spuknikv, 20 , 30).
vacuna(jandj, 13, 20).

nombre(armando, 15). %Hechos
nombre(alondra, 22).
nombre(angel, 30).
nombre(bryan, 18).
nombre(rafael, 20).
nombre(omar, 17).
nombre(juan, 75).
nombre(salvador, 33).
nombre(america, 30).
nombre(daniel, 50).
nombre(bryan, 19).
nombre(rafael, 55).
nombre(martin, 88).

vacunar(Nom) :- nombre(Nom, Ed), vacuna(Far, R1, R2),
    Ed >= R1, Ed < R2, write(Nom), tab(3), write(Far).

vacunados(_) :-
    vacuna(Far, R1, R2), nl, write("personas vacunados por: "), write(Far),
    nombre(Nom, Ed), Ed >= R1, Ed < R2, nl, write(Nom), fail.