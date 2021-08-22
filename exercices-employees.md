# Exercices de sélection sur la base employees. 

Le schéma décrivant la base se trouve ici : https://dev.mysql.com/doc/employee/en/sakila-structure.html


## Requêtes d'interrogation simples. 
Effectuez les requêtes suivantes : 

 1. Afficher le numéro, le nom, le prénom, le genre et la date de naissance de chaque employé. ( emp_no, last_name, first_name,  gender, birth_date )

            select emp_no, last_name, first_name,  gender, birth_date from employees


 2. Trouver tous les employés dont le prénom est 'Troy'. ( emp_no, first_name, last_name, gender )

            select emp_no, first_name, last_name, gender from employees
            where first_name ilike 'troy';

 3. Trouver tous les employés de sexe féminin ( * ).

            select * from employees
            where gender='F';

 4. Trouver tous les employés de sexe masculin nés après le 31 janvier 1965 ( * ) ?

                        select * from employees
                        where gender='M'and birth_date>'1965-01-31';

 5. Lister uniquement les titres des employés, sans que les valeurs apparaissent plusieurs fois. (title) ?

                select distinct title from titles;
            
 6. Combien y a t'il de département ? ( nombreDep ) ? 9

                select * from departments; 

 7. Qui a eu le salaire maximum de tous les temps, et quel est le montant de ce salaire ? (emp_no, maxSalary) ?

                        select emp_no, salary from salaries
                        order by salary desc
                        limit 1;

          salaire  158220 |  id 43624   |   Tokuyasu  Pesch 

 8. Quel est salaire moyen de l'employé numéro 287323 toute période confondue ?  (emp_no, salaireMoy)
 
                                avg(salary) from salaries
                                where emp_no='287323'; 

                                76296.333333333333

 9. Qui sont les employés dont le prénom fini par 'ard' (*) ? 1677

                        select count (*) from employees
                        where first_name ilike '%ard';

 10. Combien de personnes dont le prénom est 'Richard' sont des femmes ? 94

                        select * from employees
                        where first_name ilike 'richard' and gender = 'F';


 11. Combien y a t'il de titre différents d'employés (nombreTitre) ? 443308

                        select count (title) from titles;           

 12. Dans combien de département différents a travaillé l'employé numéro 287323 (nombreDep) ? 1

                        select count (Dept_no) from dept_emp
                        where emp_no='287323';

 
 13. Quels sont les employés qui ont été embauchés en janvier 2000. (*) ? Les résultats doivent être ordonnés par date d'embauche chronologique

                        SELECT * FROM employees
                        WHERE "hire_date"::text  LIKE '2000-01-%'
                        ORDER BY hire_date ASC;
 
 14. Quelle est la somme cumulée des salaires de toute la société (sommeSalaireTotale) ? 181480757419

                        select sum(salary)from salaries;


## Requêtes avec jointures :
 15. Quel était le titre de Danny Rando le 12 janvier 1990 ? (emp_no, first_name, last_name, title) ?senior staff, staff

                select employees.emp_no, first_name, last_name, title from employees
                join titles on employees.emp_no=titles.emp_no
                where first_name = 'Danny' and last_name = 'Rando';

 16. Combien d'employés travaillaient dans le département 'Sales' le 1er Janvier 2000 (nbEmp) ? 

                            SELECT COUNT(emp_no) AS "nbEmp"  FROM dept_emp
                            WHERE dept_no = 'd007'
                            AND from_date < '2000-01-01'
                            AND to_date > '2000-01-01'


 18. Quelle est la somme cumulée des salaires de tous les employés dont le prénom est Richard (emp_no, first_name, last_name, sommeSalaire) ?

                            SELECT employees.emp_no, employees.first_name, SUM(salary) FROM employees
                            JOIN salaries ON employees.emp_no = salaries.emp_no
                            WHERE employees.first_name = 'Richard'
                            group by employees.emp_no, employees.first_name, employees.last_name;

## Agrégation

 19. Indiquer pour chaque prénom 'Richard', 'Leandro', 'Lena', le nombre de chaque genre (first_name, gender, nombre). Les résultats seront ordonnés par prénom décroissant et genre. 

                        select first_name, gender, count(gender) as "nombre" from employees
                        where first_name = 'Richard' or first_name='Leandro' or first_name = 'Lena'
                        group by first_name,gender
                        order by gender desc;

 20. Quels sont les noms de familles qui apparaissent plus de 200 fois (last_name, nombre) ? Les résultats seront triés par leur nombre croissant et le nom de famille.

                        select last_name, count (*) as "nombre" from employees
                        group by last_name
                        having count(last_name) >= '200'
                        order by nombre asc;
o
 21. Qui sont les employés dont le prénom est Richard qui ont gagné en somme cumulée plus de 1 000 000 (emp_no, first_name, last_name, hire_date, sommeSalaire) ? 0

                        select distinct employees.emp_no, first_name, last_name, hire_date, sum(salary) as sommeSalaire from employees
                        join salaries on salaries.emp_no = employees.emp_no
                        join dept_emp on employees.emp_no=salaries.emp_no
                        group by employees.emp_no, salary
                        having first_name like 'Richard' and 'sommesalaire' >= '1000000'
                        limit 5;
                        
                        
                        


                        
 22. Quel est le numéro, nom, prénom  de l'employé qui a eu le salaire maximum de tous les temps, et quel est le montant de ce salaire ? (emp_no, first_name, last_name, title, maxSalary)    
 43624 | Tokuyasu   | Pesch     | Senior Staff | 158220
 bonus. Qui est le manager de Martine Hambrick actuellement et quel est son titre (emp_no, first_name, last_name, title) 

                            select employees.emp_no, first_name, last_name, title from employees
                            join salaries on salaries.emp_no = employees.emp_no
                            join titles on titles.emp_no = employees.emp_no
                            join dept_emp on employees.emp_no=salaries.emp_no
                            order by salary desc
                            limit 1 ;


## La suite : 
 23. Quel est actuellement le salaire moyen de chaque titre  (title, salaireMoyen) ? Classé par salaireMoyen croissant

                            select distinct title, salary, avg(salary) as salaireMoyen from titles
                            join salaries on salaries.emp_no=titles.emp_no
                            group by title
                            order by 'salairemoyen' asc;
                            


 24. Combien de manager différents ont eu les différents départements (dept_no, dept_name, nbManagers), Classé par nom de département



 25. Quel est le département de la société qui a le salaire moyen le plus élevé (dept_no, dept_name, salaireMoyen) 

 26. Quels sont les employés qui ont eu le titre de 'Senior Staff' sans avoir le titre de 'Staff' ( emp_no , birth_date , first_name , last_name , gender , hire_date )

 27. Indiquer le titre et le salaire de chaque employé lors de leur embauche (emp_no, first_name, last_name, title, salary)

 28. Quels sont les employés dont le salaire a baissé (emp_no, first_name, last_name)
