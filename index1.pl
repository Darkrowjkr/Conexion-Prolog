%Hechos
imparte(juan, matematicas1).
imparte(juan, matematicas2).
imparte(jose, matematicas3).
imparte(jose, fisica1).
imparte(julian, fisica2).
imparte(julian, basedatos1).
imparte(jimenes, basedatos2).
imparte(jimenes, basedatos3).
imparte(juana, logica).
imparte(juana, estadistica1).
imparte(eric, estadistica2).
imparte(eric, diferencial).
imparte(iraik, integral).
imparte(iraik, vectorial).
imparte(mariela, ecuaciones).
imparte(mariela, economia).
imparte(maricela, software1).
imparte(maricela, software2).
imparte(maria, protocolos).
imparte(maria, redes1).
imparte(marco, redes2).
imparte(marco, redes3).
imparte(matias, empresas).
imparte(matias, sustentabilidad).

docente(juan, sistemas).
docente(jose, sistemas).
docente(julian, sistemas).
docente(jimenes, mecatronica).
docente(juana, mecatronica).
docente(eric, mecatronica).
docente(iraik, industrial).
docente(mariela, industrial).
docente(maricela, industrial).
docente(maria, tics).
docente(marco, tics).
docente(matias, tics).

materia(matematicas1, 8).
materia(matematicas2, 2).
materia(matematicas3, 8).
materia(fisica1, 8).
materia(fisica2, 7).
materia(basedatos1, 8).
materia(basedatos2, 6).
materia(basedatos3, 8).
materia(logica, 8).
materia(estadistica1, 8).
materia(estadistica2, 4).
materia(diferencial, 8).
materia(integral, 3).
materia(vectorial, 1).
materia(ecuaciones, 8).
materia(economia, 8).
materia(software1, 8).
materia(software2, 7).
materia(protocolos, 8).
materia(redes1, 8).
materia(redes2, 9).
materia(redes3, 5).
materia(empresas, 10).
materia(sustentabilidad, 1).

%reglas

docentes_academia(Y):- write("Los Docentes de "),
    write(Y), write(" son:"),nl,
    docente(X, Y), write(X), nl, fail.

docente_imparte(X):- docente(X, _), write("El Docente "), 
    write(X), write(" imparte: "),nl,
    imparte(X, M), write("La Materia de "), write(M), 
    write(" de "), materia(M, H), write(H), write("hrs"), nl, fail.