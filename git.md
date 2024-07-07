
# First Init
echo "# shop" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/mohammedib245/shop.git
git push -u origin main



# push To remote repo
git remote add origin https://github.com/mohammedib245/shop.git
git branch -M main
git push -u origin main

# check status 
git status
# check diffrent
 git diff

# =====================
# Make Branch 
# Make copies of all the relevant files to avoid impacting the live version
git branch Name
 ## Flags 
    (-d)
  - git branch -d Name
    Deleted branch Name 
# show all Branches 
git branch

# move to branch
git checkout Name

# switch to new branch
    (-b)
    - git checkout -b Name
    Switched to a new branchName 
# Delete branch
    (-d)
    - git branch -d Name
    Deleted branch branchName (was dfa79db).

# ============== 

# add files 
git add .  | git add --all

# commit to stage 
git commit -m "Your Message"

# Must Move to main branch To push and merge the branch into main bracnh
git checkout Name 

# push to remote repo  main
git push -u origin main 

# merge 
git merge BranchName



# HTTPs
https://github.com/mohammedib245/shop.git
# SSH
git@github.com:mohammedib245/shop.git