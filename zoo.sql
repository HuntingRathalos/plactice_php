8+ Numeric Examples

1.
SELECT A_STRONGLY_AGREE
    FROM nss
WHERE question='Q01'
    AND institution='Edinburgh Napier University'
    AND subject='(8) Computer Science';

2.
SELECT institution, subject
    FROM nss
WHERE question='Q15'
    AND score >= 100;

3.
SELECT institution,score
    FROM nss
WHERE question='Q15'
    AND subject='(8) Computer Science'
    AND score <= 50;

4.
SELECT subject, SUM(response)
    FROM nss
WHERE question='Q22'
    AND subject IN ('(8) Computer Science', '(H) Creative Arts and Design')
GROUP BY subject;

5.
-- responseは回答者数でA_STRONGLY_AGREEは強く同意するを選んだ人のパーセンテージ
SELECT subject, SUM(response * A_STRONGLY_AGREE / 100)
    FROM nss
WHERE question='Q22'
    AND subject IN ('(8) Computer Science', '(H) Creative Arts and Design')
GROUP BY subject;

6. -- 回答みる感じだとこれだけど、正解にならない
SELECT subject,
       ROUND((SUM(response * A_STRONGLY_AGREE / 100) / SUM(response)) *100, 0)
    FROM nss
WHERE   question    = 'Q22'
    AND subject IN ('(8) Computer Science', '(H) Creative Arts and Design')
GROUP BY subject;

7. -- 回答みる感じだとこれだけど、正解にならない
SELECT institution,
       ROUND(SUM(response * score / 100) / SUM(response) * 100, 0)
    FROM nss
WHERE question = 'Q22'
    AND institution LIKE '%Manchester%'
GROUP BY institution;

8.
SELECT institution,
        SUM(sample),
        SUM(CASE WHEN subject = '(8) Computer Science' THEN sample ELSE 0 END) AS computing_students
    FROM nss
WHERE question='Q01'
    AND (institution LIKE '%Manchester%')
GROUP BY institution;
