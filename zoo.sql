9

1.
SELECT COUNT(name)
    FROM stops;

2.
SELECT id
    FROM stops
WHERE name = 'Craiglockhart';

3. -- この辺から全体的にわかりづらい
SELECT s.id, s.name
    FROM stops s
INNER JOIN route r
ON s.id = r.stop
WHERE r.num = '4'
AND r.company = 'LRT';

4.
SELECT company, num, COUNT(*)
FROM route WHERE stop=149 OR stop=53
GROUP BY company, num
HAVING COUNT(*) = 2;

5.
SELECT a.company, a.num, a.stop, b.stop
FROM route a JOIN route b ON
    (a.company=b.company AND a.num=b.num)
WHERE a.stop=53 AND b.stop = 149;

6.
SELECT a.company, a.num, stopa.name, stopb.name
FROM route a JOIN route b ON
    (a.company=b.company AND a.num=b.num)
    JOIN stops stopa ON (a.stop=stopa.id)
    JOIN stops stopb ON (b.stop=stopb.id)
WHERE stopa.name='Craiglockhart'
AND stopb.name='London Road';

7.
SELECT DISTINCT(a.company), a.num
FROM route a
INNER JOIN route b
ON (a.company = b.company AND a.num = b.num)
WHERE a.stop = 115
AND b.stop = 137;

SELECT DISTINCT(a.company), a.num
FROM route a
INNER JOIN route b
ON (a.company = b.company AND a.num = b.num)
    INNER JOIN stops stopa ON (a.stop = stopa.id)
    INNER JOIN stops stopb ON (b.stop = stopb.id)
WHERE stopa.name='Haymarket' and stopb.name='Leith';

8.
SELECT DISTINCT(a.company), a.num
FROM route a
INNER JOIN route b
ON (a.company = b.company AND a.num = b.num)
    INNER JOIN stops stopa ON (a.stop = stopa.id)
    INNER JOIN stops stopb ON (b.stop = stopb.id)
WHERE stopa.name='Craiglockhart' and stopb.name='Tollcross';

9.
SELECT stopb.name,a.company, a.num
FROM route a
INNER JOIN route b
ON (a.company = b.company AND a.num = b.num)
    INNER JOIN stops stopa ON (a.stop = stopa.id)
    INNER JOIN stops stopb ON (b.stop = stopb.id)
WHERE a.company = 'LRT'
AND stopa.name = 'Craiglockhart';

10. -- よくわかんなかった
SELECT a.num, a.company, stopb.name, c.num, c.company
FROM route a JOIN route b ON
    (a.company = b.company AND a.num = b.num)
    JOIN (route c join route d on (c.company = d.company and c.num = d.num))
    JOIN stops stopa ON (a.stop = stopa.id)
    JOIN stops stopb ON (b.stop = stopb.id)
    JOIN stops stopc on (c.stop = stopc.id)
    JOIN stops stopd on (d.stop = stopd.id)
WHERE  stopa.name='Craiglockhart'
    AND stopd.name='Lochend'
    AND stopb.name = stopc.name
ORDER BY a.num, a.company, stopb.name, c.num;
