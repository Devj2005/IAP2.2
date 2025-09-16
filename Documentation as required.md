IAP ASSIGNMENT

 The user has to sign up.

Once the user signs up a verification email is sent to the email the user registered with


Then once the user presses ‘Click here’; the user gets verified and then can sign in.


5.  Once the user signs in he meets the simple dashboard











PART II:
The list in the database is numbered as required and also in ascending order a-z.

SELECT 
  @rownum := @rownum + 1 AS number,
  name,
  email
FROM users, (SELECT @rownum := 0) r
ORDER BY name ASC;


PART III:
Git workflow:
devyanjethwaa@fedora:/var/www/html/IAP2.2$ Git Workflow
dd changes:
   git add .

3. Commit changes:
   git commit -m "Describe your changes here"

4. Push to remote repository:
   git push origin main

5. Pull latest changes:
   git pull origin main

6. Cbash: Git: command not found...
Similar command is: 'git'
reate a new branch (if needed):
   git checkout -bdevyanjethwaa@fedora:/var/www/html/IAP2.2$ 
 feature-branch

7. Merge branch (if needed):
   gdevyanjethwaa@fedora:/var/www/html/IAP2.2$ 1. Check status:
it checkout main
   git merge feature-branchbash: 1.: command not found...
devyanjethwaa@fedora:/var/www/html/IAP2.2$    git status
On branch main
Your branch is up to date with 'origin/main'.

Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git restore <file>..." to discard changes in working directory)
        modified:   Forms/Forms.php
        modified:   signin.php
        modified:   signup.php

Untracked files:
  (use "git add <file>..." to include in what will be committed)
        Project_Explanation.docx
        verify.php

no changes added to commit (use "git add" and/or "git commit -a")
devyanjethwaa@fedora:/var/www/html/IAP2.2$ 
devyanjethwaa@fedora:/var/www/html/IAP2.2$ 2. Add changes:
bash: 2.: command not found...
devyanjethwaa@fedora:/var/www/html/IAP2.2$    git add .
devyanjethwaa@fedora:/var/www/html/IAP2.2$ 
devyanjethwaa@fedora:/var/www/html/IAP2.2$ 3. Commit changes:
bash: 3.: command not found...
devyanjethwaa@fedora:/var/www/html/IAP2.2$    git commit -m "Describe your changes here"
[main b0079e5] Describe your changes here
 5 files changed, 84 insertions(+), 6 deletions(-)
 create mode 100644 Project_Explanation.docx
 create mode 100644 verify.php
devyanjethwaa@fedora:/var/www/html/IAP2.2$ 
devyanjethwaa@fedora:/var/www/html/IAP2.2$ 4. Push to remote repository:
bash: 4.: command not found...
devyanjethwaa@fedora:/var/www/html/IAP2.2$    git push origin main
Enumerating objects: 13, done.
Counting objects: 100% (13/13), done.
Delta compression using up to 12 threads
Compressing objects: 100% (6/6), done.
Writing objects: 100% (8/8), 1.76 KiB | 1.76 MiB/s, done.
Total 8 (delta 4), reused 0 (delta 0), pack-reused 0 (from 0)
remote: Resolving deltas: 100% (4/4), completed with 3 local objects.
To https://github.com/Devj2005/IAP2.2.git
   ba76469..b0079e5  main -> main
devyanjethwaa@fedora:/var/www/html/IAP2.2$ 
devyanjethwaa@fedora:/var/www/html/IAP2.2$ 5. Pull latest changes:
bash: 5.: command not found...
devyanjethwaa@fedora:/var/www/html/IAP2.2$    git pull origin main
From https://github.com/Devj2005/IAP2.2
 * branch            main       -> FETCH_HEAD
Already up to date.
devyanjethwaa@fedora:/var/www/html/IAP2.2$ 
devyanjethwaa@fedora:/var/www/html/IAP2.2$ 6. Create a new branch (if needed):
bash: syntax error near unexpected token `('
devyanjethwaa@fedora:/var/www/html/IAP2.2$    git checkout -b feature-branch
Switched to a new branch 'feature-branch'
devyanjethwaa@fedora:/var/www/html/IAP2.2$ 
devyanjethwaa@fedora:/var/www/html/IAP2.2$ 7. Merge branch (if needed):
bash: syntax error near unexpected token `('
devyanjethwaa@fedora:/var/www/html/IAP2.2$    git checkout main
Switched to branch 'main'
Your branch is up to date with 'origin/main'.
devyanjethwaa@fedora:/var/www/html/IAP2.2$    git merge feature-branch
Already up to date.



